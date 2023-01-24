<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class Shipping extends Model
{
    
    public static function readShipping()
    {
         $x = DB::table('shipping as s')
         ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 's.bl_id')
            ->select(
                's.id as id',
                'bolm.pro_number as pro_number',
                'bolm.bl_number as bl_number',
                's.totalAmount',
                's.shipping_allowance',
                's.grand_total',
                's.status',
                's.created_by',
                's.created_at',
                's.updated_by',
                's.updated_at')
            ->orderBy('s.created_at', 'desc') 
            ->get();

         return $x;
        
    }



    public static function createShipping($x)
    {
        // if($x['non_bl'] == 'Yes'){
        // $y = DB::table('shipping')
        //     ->insert(
        //         array(
        //             'bl_id'              => '',
        //             'pro_number'         => '',
        //             'totalAmount'        => $x['totalAmount'],
        //             'shipping_allowance' => $x['shipping_allowance'],
        //             'grand_total'        => $x['grand_total'],
        //             'status'             => 'For Releasing',
        //             'created_by'         => auth::user()->id,
        //             'created_at'         => date("Y-m-d H:i:s")

        //         )
        //     );
        // }else{
        $y = DB::table('shipping')
            ->insert(
                array(
                    'bl_id'              => $x['bl_id'],
                    'pro_number'         => $x['pro_number'],
                    'totalAmount'        => $x['totalAmount'],
                    'shipping_allowance' => $x['shipping_allowance'],
                    'grand_total'        => $x['grand_total'],
                    'status'             => 'For Releasing',
                    'created_by'         => auth::user()->id,
                    'created_at'         => date("Y-m-d H:i:s")

                )
            );
        // }
   
            $shippingID = DB::getPdo()->lastInsertId();
          
            
            foreach ($x['purpose'] as $key => $value) {
                   $a = DB::table('shipping_child')
                   ->insert(
                       array(
                           'shipping_id'  => $shippingID,
                           'payee'        => $x['payee'],
                           'amount'       => $x['amount'][$key],
                           'purpose'      => $x['purpose'][$key],
                           'client'       => $x['client']
                     
                       )
                   );
             
            // $b = DB::table('bill_of_lading_management')
            //     ->where('id', '=', $x['bl_id'])
            //     ->update(
            //         array(
            //             'shipping_status'   => '1'
            //         )
            // );

           }
        
        return $y;
    }

    public static function getShipping($id)
    {
        $y = DB::table('shipping as s')
            ->select(
                's.id as id',
                'bolm.id as pro_number_id',
                'bolm.pro_number as pro_number',
                'bolm.bl_number as bl_number',
                'bolm.consignee_id as consignee',
                'bolm.customer_number as client',
                's.created_by as created_by',
                's.created_at as created_at',
                's.totalAmount',
                's.shipping_allowance',
                's.grand_total'
            )
            ->where('s.id', '=', $id)
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 's.bl_id')
            ->get();
        return $y;
    }

    public static function viewShipping($id)
    {
        $y = DB::table('shipping as s')
        ->where('s.id', '=', $id)
            ->select(
                's.id as id',
                'bolm.pro_number as pro_number',
                'bolm.bl_number as bl_number',
                's.totalAmount as totalAmount',
                's.shipping_allowance as shipping_allowance',
                's.grand_total as grand_total',
                's.status',
                's.status_date',
                's.created_by as created_by',
                's.created_at as created_at')
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 's.bl_id')
            ->get();
        return $y;
    }

    public static function deleteShippingItem( $x )
    {
        $result = DB::table('shipping_child')
            ->where('id', '=', $x['id'])
            ->delete();
        return $result;
    }

    public static function getShippingItem($x)
    {
        $result = DB::table('shipping_child')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function updateShippingItem($x)
    {
        $y = DB::table('shipping_child')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    // 'payee'         => $x['edit_payee'],
                    'purpose'       => $x['edit_purpose'],
                    // 'client'        => $x['edit_client'],
                    'amount'        => $x['edit_amount']
                    
                    // 'updated_by'         => auth::user()->id,
                    // 'updated_at'         => date("Y-m-d H:i:s")

                )
            );

        return $y;
    }

    public static function releaseShippingForm($x)
    {
        $result = DB::table('shipping')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 'Released',
                    'status_date' =>  date("Y-m-d H:i:s")
                )
            );
     
        return $result;
    }

    public static function fetchShippingDetails($id)
    {
        $y = DB::table('shipping_child as sc')
            ->where('sc.shipping_id', '=', $id)
            ->select(
                'sc.id as child_id',
                'sc.amount',
                'sc.client',

                'cm.id as consignee_id',
                'cm.consignee as consignee_name',
                'bolm.pro_number as pro_num',
                'pm.code as purpose',
                's.bl_id as s_id',
                'pm.name as purpose_name',  
                'pm.code as code',
                 )
            ->leftJoin('shipping as s', 's.id', '=', 'sc.shipping_id')
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 's.bl_id')
            // ->leftJoin('shipping_line_management as slm', 'slm.id', '=', 'sc.payee')
            ->leftJoin('purpose_management as pm', 'pm.id', '=', 'sc.purpose')
            ->leftJoin('consignee_management as cm', 'cm.id', '=', 'sc.payee')
            // ->leftJoin('client_management as cm', 'cm.id', '=', 'sc.client')
            ->get();
        return $y;
    }

    public static function fetchShippingTotalAmount($id)
    {
        $y = DB::table('shipping_child as sc')
            ->where('sc.shipping_id', '=', $id)
            ->selectRaw(
                 'sum(sc.amount) as amount'
            )
            ->get();
        return $y;
    }

    public static function fetchShippingForUpdate($id)
    {
        $y = DB::table('shipping as s')
            ->where('s.id', '=', $id)
            ->select(
                's.id as id',
                'bolm.bl_number as bl_number',
                's.created_by as created_by',
                's.created_at as created_at',
                'bolm.customer_number as payee',
                'sc.amount',
                'pm.code as purpose', 
                'cm.code as client',
                'bolm.pro_number as pro_num')
            ->leftJoin('shipping_child as sc', 'sc.shipping_id', '=', 's.id')
            ->leftJoin('shipping_line_management as slm', 'slm.id', '=', 'sc.payee')
            ->leftJoin('particular_management as pm', 'pm.id', '=', 'sc.purpose')
            ->leftJoin('client_management as cm', 'cm.id', '=', 'sc.client')
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 's.bl_id')
            ->get();
        return $y;
    }

        // if( isset($x['item_id']) && !empty($x['item_id']) ){
        //     foreach($x['item_id'] as $key => $value) {
        //         DB::table('job_order_item')
        //             ->insert(
        //                 array(
        //                     'jo_main'               => $x['id'],
        //                     'item_id'               => $x['item_id'][$key],
        //                     'qty'                   => $x['qty'][$key],
        //                     'unit'                  => $x['unit'][$key],
        //                     'purchased_price'       => $x['purchased_price'][$key],
        //                 )
        //             );
        //     }
        // }
    public static function editShipping($x)
    {
        $y = DB::table('shipping')
            ->where('id', '=', $x['shipping_id'])
            ->update(
                array(
                    'totalAmount'          => $x['addtotalAmount'],
                    'shipping_allowance'   => $x['shipping_allowance'],
                    'grand_total'          => $x['addtotalAmount'],
                    'updated_by'           => auth::user()->id,
                    'updated_at'           => date("Y-m-d H:i:s")

                )
            );


            foreach ($x['purpose'] as $key => $value) {
                if($x['purpose'][$key] != null){
                   $a = DB::table('shipping_child')
                   // ->where('shipping_id', '=', $x['shipping_id'])
                   ->insert( 
                       array(
                           'shipping_id'  => $x['shipping_id'],
                           'payee'        => $x['payee'],
                           'amount'       => $x['amount'][$key],
                           'purpose'      => $x['purpose'][$key],
                           'client'       => $x['client']
                       )
                   );
               }                              
            }  

        
        return $y;
    }


 
}