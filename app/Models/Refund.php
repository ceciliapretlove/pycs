<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class Refund extends Model
{
    public static function createRefund($x)
    {
        $y = DB::table('refund_management')
            ->insert(
                array(

                    'pro_number'       => $x['pro_id'],
                    'date_refunded'    => $x['date_refunded'],
                    'amount_of_refund' => $x['amount_of_refund'],
                    'deduction'        => $x['deduction'],
                    'status'           => 'Refunded',
                    'created_by'       => auth::user()->id,
                    'created_at'       => date("Y-m-d H:i:s")

                )
            );

            $refundID = DB::getPdo()->lastInsertId();
            
            foreach ($x['check_num'] as $key => $value) {
            
                   $a = DB::table('refund_checks')
                   ->insert(
                       array(
                           'refund_id'    => $refundID,
                           'check_num'    => $x['check_num'][$key]
                       )
                   );
             
             $b = DB::table('bill_of_lading_management')
                ->where('id', '=', $x['pro_id'])
                ->update(
                    array(
                        'refund_status'   => '1'
                    )
            );

           }
        return $y;
    }    
    public static function readRefund()
    {
        $y = DB::table('refund_management as rm')
            ->select(
                'rm.id as id',
                'rm.pro_number as pro_number_id',
                'rm.date_refunded as date_refunded',
                'rm.deduction as deduction',
                'rm.amount_of_refund as amount_of_refund',
                'rm.status as status',
                'bolm.pro_number as pro_number',
                'sc.amount as cdep_amount',
                'sc.purpose as sc_purpose'

            )  
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'rm.pro_number')
            ->leftJoin('shipping as sp', 'sp.bl_id', '=', 'bolm.id')
            ->leftJoin('shipping_child as sc', 'sc.shipping_id', '=', 'sp.id')
            // ->where('sc.purpose','=', '2')

         ->orderBy('bolm.pro_number', 'desc') 
            ->paginate(10)
            ->map(function($item){
            $item->{'check_num'} =   DB::table('refund_checks as rc')
                ->select('*')
                ->where('rc.refund_id',$item->id)
                ->get();
            $item->{'total_deduction'} =   DB::table('refund_management')
                ->select('deduction')
                ->sum('refund_management.deduction');
                 return $item;
            });

        return $y;
    }

       public static function readRefundPagination()
    {
         $y = DB::table('refund_management as rm')
            ->select(
                'rm.id as id',
                'rm.pro_number as pro_number_id',
                'rm.date_refunded as date_refunded',
                'rm.deduction as deduction',
                'rm.amount_of_refund as amount_of_refund',
                'rm.status as status',
                'bolm.pro_number as pro_number',
            )  
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'rm.pro_number')
       
           ->paginate(10);

        return $y;
    }
    public static function readTotalDeduction()
    {
        $y = DB::table('refund_management as rm')
        ->select('deduction')
        ->sum('deduction');
        return $y;
    }

        public static function readTotalRefunded()
    {
        $y = DB::table('refund_management as rm')
        ->select('amount_of_refund')
        ->sum('amount_of_refund');
        return $y;
    }

    //     public static function readTotalContainerDeposit()
    // {
    //     $y = DB::table('bill_of_lading_management as bolm')
    //     ->select('bolm.container_deposit')
    //     ->sum('container_deposit');
    //     return $y;
    // }
    public static function readTotalContainerDeposit()
    {
        $y = DB::table('shipping_child as sc')
        ->where('purpose', '=', '2')
        ->select('sc.amount')
        ->sum('amount');
        return $y;
    }
        public static function readTotalForRefund()
    {

        // $deduction = DB::table('refund_management as rm')
        // ->select('rm.deduction')
        // ->sum('deduction');


        // $amountOfRefund = DB::table('refund_management as rm')
        // ->select('rm.amount_of_refund')
        // ->sum('amount_of_refund');

        $totalRefunded = DB::table('refund_management as rm')
        ->select('amount_of_refund')
        ->sum('amount_of_refund');

        $containerDeposit = DB::table('shipping_child as sc')
        ->where('purpose', '=', '2')
        ->select('sc.amount')
        ->sum('amount');


        $forRefund = $containerDeposit - $totalRefunded;


        return $forRefund;
    }


    public static function readRefundCheckNos($id)
    {
        $y = DB::table('refund_checks')
            ->where('refund_id', '=', $id)
            ->select('*')  
            ->get();
        return $y;
    }

    public static function getRefund($id)
    {

        $y = DB::table('refund_management as rf')
             ->where('rf.id', '=', $id)
             ->select(
                'rf.id',
                'rf.date_refunded',
                'rf.amount_of_refund',
                'rf.deduction',
                'rf.pro_number as pro_id',
                'bolm.pro_number as pro_number'
            )
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'rf.pro_number')
            ->get()

            ->map(function($item){
            $item->{'container_deposit'} =   DB::table('bill_of_lading_management as ccd')
                ->select('*')
                ->sum('container_deposit');

            $item->{'check_num'} =   DB::table('refund_checks as rc')
                ->select('*')
                ->where('rc.refund_id',$item->id)
                ->get();
                 return $item;
            });
        return $y;


    }
    public static function getRefundChecks($id)
    {

        $y = DB::table('refund_checks')
             ->where('refund_id', '=', $id)
             ->select('*')
             ->get();
        return $y;


    }
    public static function editRefund($x)
    {
        $y = DB::table('refund_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'pro_number'        => $x['pro_id'],
                    'date_refunded'     => $x['date_refunded'],
                    'deduction'         => $x['deduction'],
                    'amount_of_refund'  => $x['amount_of_refund'],
                    'updated_by'        => auth::user()->id,
                    'updated_at'        => date("Y-m-d H:i:s")
                    
                )
            );
            foreach ($x['check_num'] as $key => $value) {
                if($x['check_num'][$key] != null){
                   $a = DB::table('refund_checks')
                   ->where('refund_id', '=', $x['id'])
                   ->update( 
                       array(
                           'refund_id'     => $x['id'],
                           'check_num'     => $x['check_num'][$key]
                       )
                   );
               }                              
            }  
       
        return $y;

    }

    public static function BillOfLadingDetails($id)
    {

        $y = DB::table('bill_of_lading_management as bolm')
          ->select(
                'bolm.id',
                'bolm.pro_number',
                'bolm.date',
                'bolm.port_discharge as port_discharge_id',
                'bolm.vessel',
                'bolm.consignee_id',
                'bolm.shipper_id',
                'bolm.shipping_line as shipping_line_id',
                'bolm.port_loading as port_loading_id',
                'bolm.customer_number',
                'bolm.voyage_number',
                'bolm.description',
                'bolm.bl_number',
                'bolm.gross_weight',
                'bolm.estimated_time_arrival',
                'pl.port as port_loading',
                'pd.port as port_discharge',
                'cm.consignee',
                'sm.shipper',
                'slm.shipping_line',
                'c.fname as cb_fname',
                'c.lname as cb_lname',

            )
            ->where('bolm.id', '=', $id)
            ->leftJoin('users as c', 'c.id', '=', 'bolm.created_by')
            ->leftJoin('consignee_management as cm', 'cm.id', '=', 'bolm.consignee_id')
            ->leftJoin('shipper_management as sm', 'sm.id', '=', 'bolm.shipper_id')
            ->leftJoin('shipping_line_management as slm', 'slm.id', '=', 'bolm.shipping_line')
            ->leftJoin('port_management as pl', 'pl.id', '=', 'bolm.port_loading')
            ->leftJoin('port_management as pd', 'pd.id', '=', 'bolm.port_discharge')
            ->get()
            ->map(function($item){
                $item->{'container_deposit'} =   DB::table('bill_of_lading_management as bolm')
                    ->select('*')
                    ->where('bolm.pro_number',$item->pro_number)
                    ->sum('container_deposit');
                $item->{'container'} =   DB::table('bill_of_lading_containers as bolc')
                    ->select('*')
                    ->where('bolc.bill_of_lading_id',$item->id)
                    ->get();
                     return $item;
                });      
        return $y;


    }

        public static function updateEmptyReturn($x)
    {
        $y = DB::table('bill_of_lading_containers')
            ->where('id', '=', $x['id'])
            ->update(
                array(

                    // 'container_deposit'  => $x['edit_container_deposit'],
                    'empty_return'       => $x['edit_empty_return'],
                    'trucker'            => $x['edit_trucker'],
                    'updated_by'         => auth::user()->id,
                    'updated_at'         => date("Y-m-d H:i:s")

                )
            );
        

        
        return $y;
    }

    public static function readEmptyReturnList()
    {
          $x = DB::table('bill_of_lading_management as bolm')
            ->select(
                'bolm.id',
                'bolm.pro_number',
                'bolm.consignee_id',
                'bolm.shipper_id',
                'bolm.bl_number',
                'bolm.customer_number',  
                'slm.shipping_line',
                'bolm.date',
                'c.consignee',
                's.shipper',
                'sc.purpose as sc_purpose',
                'sc.amount as cdep_amount'
            )
            ->leftJoin('port_management as pml', 'pml.id', '=', 'bolm.port_loading')
            ->leftJoin('port_management as pmd', 'pmd.id', '=', 'bolm.port_discharge')
            ->leftJoin('consignee_management as c', 'c.id', '=', 'bolm.consignee_id')
            ->leftJoin('shipper_management as s', 's.id', '=', 'bolm.shipper_id')
            ->leftJoin('shipping_line_management as slm', 'slm.id', '=', 'bolm.shipping_line')
            ->leftJoin('shipping as sp', 'sp.bl_id', '=', 'bolm.id')
            ->leftJoin('shipping_child as sc', 'sc.shipping_id', '=', 'sp.id')
            // ->where('sc.purpose','=', '2')
            ->orderBy('bolm.pro_number', 'desc') 
           ->get()     
            ->map(function($item){
                $item->{'container_deposit'} =   DB::table('bill_of_lading_management as bolm')
                    ->select('*')
                    ->where('bolm.pro_number',$item->pro_number)
                     ->get();
                $item->{'container'} =   DB::table('bill_of_lading_containers as bolc')
                    ->select('*')
                    ->where('bolc.bill_of_lading_id',$item->id)
                     ->get();
                     return $item;
                });
            // ->map(function($item2){
    
            //     $item2->{'cdep_amount'} =   DB::table('shipping as sp')
            //         ->select('*')
            //         ->leftJoin('shipping_child as sc', 'sc.shipping_id', '=', 'sp.id')
            //         ->where('sp.bl_id',$item2->id)

            //          ->get();
            //          return $item2;
            //     });         
            return $x;
    }


    //     public static function readEmptyReturnPagination()
    // {
    //       $x = DB::table('bill_of_lading_management as bolm')
    //         ->select(
    //             'bolm.id',
    //             'bolm.pro_number',
    //             'bolm.consignee_id',
    //             'bolm.shipper_id',
    //             'bolm.bl_number',
    //             'bolm.customer_number',    
    //             'bolm.date',
    //             'c.consignee',
    //             's.shipper'
    //         )
    //         ->leftJoin('port_management as pml', 'pml.id', '=', 'bolm.port_loading')
    //         ->leftJoin('port_management as pmd', 'pmd.id', '=', 'bolm.port_discharge')
    //         ->leftJoin('consignee_management as c', 'c.id', '=', 'bolm.consignee_id')
    //         ->leftJoin('shipper_management as s', 's.id', '=', 'bolm.shipper_id')
    //         ->orderBy('bolm.pro_number', 'desc') 
    //         ->paginate(10);       
    //         return $x;
    // }



    public static function readEmptyReturn($id)
    {
        // $y = DB::table('refund_management as rm')
        //     ->where('rm.id', '=', $id)
        //     ->select(
        //         'rm.id as id',
        //         'rm.pro_number',
        //         'bolm.date',
        //         'bolm.bl_number',
        //         'bolm.pro_number as pro_number',
        //         'bolm.id as bolm_id',
        //         'c.consignee',
        //         'slm.shipping_line',

        //     )  
        //     ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'rm.pro_number')
        //     ->leftJoin('consignee_management as c', 'c.id', '=', 'bolm.consignee_id')
        //     ->leftJoin('shipping_line_management as slm', 'slm.id', '=', 'bolm.shipping_line')
          
        //     ->get()
        //     ->map(function($item){
        //         $item->{'container_deposit'} =   DB::table('bill_of_lading_management as bolm')
        //             ->select('*')
        //             ->where('bolm.pro_number',$item->pro_number)
        //             ->sum('container_deposit');
        //         $item->{'container'} =   DB::table('bill_of_lading_containers as bolc')
        //             ->select('*')
        //             ->where('bolc.bill_of_lading_id',$item->bolm_id)
        //             ->get();
        //              return $item;
        //         });

        // return $y;
       
    }



    public static function generateFilterCost($x)
    {
        $rawD       = strtotime($x['filter']);
        $month      = date("m", $rawD);
        $year       = date("Y", $rawD);
        
        $z = DB::table('job_order as jo')
            ->whereMonth('jo.reported_date', $month)
            ->whereYear('jo.reported_date', $year)
            ->where('jo.equipment_category', '=', $x['equipment_category'])
            ->where('jo.equipment_type', '=', $x['equipment_type'])
            ->leftJoin('equipment as eq', 'eq.id', '=', 'jo.equipment_id')
            ->leftJoin('job_order_item as joi', 'joi.jo_main', '=', 'jo.id')
            ->select(
                'eq.equipment_id',
                'eq.model',
                'eq.brand',
                'eq.year_model',
                DB::raw('SUM(joi.purchased_price) as purchased_price')
            )
            ->groupBy('eq.equipment_id', 'eq.model', 'eq.year_model', 'eq.brand')
            ->orderBy('purchased_price', 'desc')
            ->limit(5)
            ->get();
        return $z;
    }


}


