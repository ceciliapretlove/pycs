<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class Liquidation extends Model
{
    public static function readLiquidation()
    {
         $x = DB::table('liquidation as ld')
           ->select(
                'ld.id',
                'ld.liquidation_num',
                'ld.pro_number',
                'ld.bl_number',
                'ld.cntr_num',
                'ld.date',
                // 'ld.cash_advance',
                'ld.expenses',
                'ld.cash_return',
                'ld.cash_refund',
                'ld.status',
                'ld.created_by',
                'ld.created_at',
                'bolm.pro_number as pro_number',
                'bolm.bl_number as bl_number',
                'u.fname as u_fname',
                'u.lname as u_lname',

            )
            // ->leftJoin('consignee_management as cs', 'cs.id', '=', 'ld.consignee')
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'ld.pro_number')
            ->leftJoin('users as u', 'u.id', '=', 'ld.created_by')
            // ->orderBy('bolm.pro_number', 'desc')
            ->orderBy('ld.created_at', 'desc')
            ->get();
         return $x;
        
    }



    public static function createLiquidation($x)
    {
        // dd($x->all());
        $y = DB::table('liquidation')
            ->insert(
                array(

                    'pro_number'      => $x['bl_id'],
                    'bl_number'       => $x['bl_number'],
                    'cntr_num'        => $x['cntr_num'],
                    'processor'        => $x['processor_id'],
                    'date'            => $x['date'],
                    'cash_advance_id'            => $x['releasedCA'],
                    'cash_advance_released'    => $x['requestedAmount'],
                    'expenses'        => $x['expenses'],
                    'cash_return'     => $x['cash_return'],
                    'cash_refund'     => $x['cash_refund'],
                    'created_by'     => auth::user()->id,
                    'created_at'     => date("Y-m-d H:i:s")

                )
            );

        $liq_id = DB::getPdo()->lastInsertId();  
        $year = substr( date("Y"), -2 );          
        $liq_num = $year.'-'. sprintf("%05d", $liq_id);
            $z = DB::table('liquidation')
                ->where('id', '=', $liq_id)
                ->update(
                    array(
                         'liquidation_num' => $liq_num
                    )
                );

        if($y == true)
        { 
            foreach ($x['particular_id'] as $key => $value) {
                if($x['particular_id'][$key] != null){
                   $a = DB::table('liquidation_particulars')
                   ->insert( 
                       array(
                           'liq_id'             => $liq_id,
                           'cash_advance_id'    => $x['releasedCA'],
                           'particular_id'      => $x['particular_id'][$key],
                           'or_num'             => $x['or_num'][$key],
                           'other'              => $x['other'][$key],
                           'paid'               => $x['paid2'][$key] == 'true' ? 1 : 0,
                           'amount'             => $x['amount'][$key],
                           'created_by'         => auth::user()->id,
                           'created_at'         => date("Y-m-d H:i:s")
                       )
                    );
                    $b = DB::table('cash_advance')
                        ->where('id', '=', $x['releasedCA'])
                        ->update(
                            array(
                                 'liquidated' => 'Yes'
                            )
                        );
                   
               }  

           }
        }
        return $y;
    }
            // foreach ($x['particular_code2'] as $key => $value) {

            //   if ( $x['particular_type'][$key] == 'check_voucher_id' ){
            //     CheckVoucherChild::where('particular',$x['particular_id'][$key])
            //     ->update([
            //         'paid' => $x['paid2'][$key] == 'true' ? 1 : 0,
            //     ]); 
            //     // $CheckVoucherChild->or_num = $x['or_num'][$key];
            //     // $CheckVoucherChild->paid   = $x['paid2'][$key] == 'true' ? 1 : 0;
            //     // $CheckVoucherChild->save();
            //    }
            //    else if( $x['particular_type'][$key] == 'cashadvance_id' ){
  

            //     CashAdvanceChild::where('particular',$x['particular_id'][$key])
            //     ->update([
            //         'paid' => $x['paid2'][$key] == 'true' ? 1 : 0,
            //     ]); 

            //    }

            // if($x['particular_code2'][$key] != null){
            //        $a = DB::table('liquidation_particulars')
            //        ->insert( 
            //            array(
            //                'liq_id'             => $liq_id,
            //                'particular_type'    => $x['particular_type'][$key],
            //                'particular_type_id' => $x['particular_type_id'][$key],
            //                'particular_child_id'=> $x['particular_id'][$key],
            //                'status'             => 1,
            //                // 'or_num'             => $x['or_num'][$key],
            //                // 'other'              => $x['other'][$key],
            //                // 'paid'               => $x['paid2'][$key] == 'true' ? 1 : 0,
            //                'amount'             => $x['amount'][$key],
            //                'created_by'         => auth::user()->id,
            //                'created_at'         => date("Y-m-d H:i:s")
            //            )
            //        );



            //         if ($x['particular_type'][$key] == 'check_voucher_id' ){
            //          $b = DB::table('check_voucher_child')
            //                 ->where('particular', '=', $x['particular_id'][$key])
            //                 ->orWhere('check_voucher_id', '=', $x['particular_type_id'][$key])
            //                 ->update(
            //                     array(
            //                         'status'   => '1'
            //                     )
            //             );
            //        }  
            //          else if( $x['particular_type'][$key] == 'cashadvance_id' ){
            //          $b = DB::table('cash_advance_child')
            //                 ->where('particular', '=', $x['particular_id'][$key])
            //                 ->orWhere('cashadvance_id', '=', $x['particular_type_id'][$key])
            //                 ->update(
            //                     array(
            //                         'status'   => '1'
            //                     )
            //             );
            //        }  

            // }  




                // if($x['particular_code2'][$key] != null){
                //        $a = DB::table('liquidation_particulars')
                //        ->insert( 
                //            array(
                //                'liq_id'             => $liq_id,
                //                'particular_type'    => $x['particular_type'][$key],
                //                'particular_type_id' => $x['particular_type_id'][$key],
                //                'particular_child_id'=> $x['particular_id'][$key],
                //                'status'             => 1,
                //                'amount'             => $x['amount'][$key],
                //                'created_by'         => auth::user()->id,
                //                'created_at'         => date("Y-m-d H:i:s")
                //            )
                //        );

                //     if ($x['particular_type'][$key] == 'cashadvance_id' ){
                //      $b = DB::table('cash_advance_child')
                //             ->where('particular', '=', $x['particular_id'])
                //             ->orWhere('cashadvance_id', '=', $x['particular_type_id'])
                //             ->update(
                //                 array(
                //                     'status'   => '1'
                //                 )
                //         );
                //     }

                //     elseif ($x['particular_type'][$key] == 'check_voucher_id' ){
                //      $c = DB::table('check_voucher_child')
                //             ->where('particular', '=', $x['particular_id'])
                //             ->orWhere('check_voucher_id', '=', $x['particular_type_id'])
                //             ->update(
                //                 array(
                //                     'status'   => '1'
                //                 )
                //         );
                //    }  


                // }
               

        //    }
        // }

        // $b = DB::table('bill_of_lading_management')
        //     ->where('id', '=', $x['bl_id'])
        //     ->update(
        //         array(
        //             'liq_status'   => '1'
        //         )
        // );



        


    public static function getLiquidation($id)
    {

        $y = DB::table('liquidation as ld')
            ->where('ld.id', '=', $id)
             ->select(
                'ld.id',
                'ld.liquidation_num as liquidation_num',
                'bolm.pro_number as pro_number',
                'ld.date',
                'ld.cash_advance_id',
                'ld.expenses',
                'ld.cash_return',
                'ld.cash_refund',
                'ld.created_by',
                'ld.created_at',
                'ld.cash_advance_released as car',
                'bolm.bl_number as bl_number',
                'bolm.id as bolm_id',
                'ca.received_amount as cash_advance_amount',
                'cm.consignee',
            )
              ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'ld.pro_number')
              ->leftJoin('consignee_management as cm', 'cm.id', '=', 'bolm.consignee_id')
              ->leftJoin('cash_advance as ca', 'ca.id', '=', 'ld.cash_advance_id')
              ->get()
            ->map(function($item){

            $item->{'cntr'} =   DB::table('bill_of_lading_containers as bolc')
                ->select('*')
                ->where('bolc.bill_of_lading_id',$item->bolm_id)
                ->get();      

                $item->{'liquidation_particulars'} =   DB::table('liquidation_particulars as lp')
                ->select('*')
                ->where('lp.liq_id',$item->id)
                
                ->leftJoin('particular_management as pm', 'pm.id', '=', 'lp.particular_id')
                ->get(); 


                // $item->{'check_voucher'} =   DB::table('check_voucher_child as tvc')
                // ->select('tvc.id as id',
                //     'tvc.particular as particular_id',
                //      'tvc.or_num as or_num',
                //       'tvc.other',
                //      'pm.particular as particular_name',
                //     'tvc.amount as amount',
                //         'tvc.paid')
                // ->where('tx.pro_number',$item->bolm_id)
                // ->leftJoin('check_voucher as tx', 'tx.id', '=', 'tvc.check_voucher_id')
                // ->leftJoin('particular_management as pm', 'pm.id', '=', 'tvc.particular')
                // ->get(); 
            return $item;
            });
        return $y;


    }

    // public static function getLiquidation($id)
    // {

    //     $y = DB::table('liquidation as ld')
    //         ->where('ld.id', '=', $id)
    //          ->select(
    //             'ld.id',
    //             'ld.liquidation_num',
    //             'ld.cntr_num',
    //             'bolm.pro_number as pro_number',
    //             'ld.date',
    //             'ld.cash_advance',
    //             'ld.expenses',
    //             'ld.cash_return',
    //             'ld.cash_refund',
    //             'ld.created_by',
    //             'ld.created_at',
    //             'bolm.bl_number as bl_number',
    //             'bolm.id as bolm_id',
    //             'cm.consignee',
    //         )
    //           ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'ld.pro_number')
    //           ->leftJoin('consignee_management as cm', 'cm.id', '=', 'bolm.consignee_id')
    //         ->get()
    //         ->map(function($item){           
    //             $item->{'cntr'} =   DB::table('bill_of_lading_containers as bolc')
    //             ->select('*')
    //             ->where('bolc.bill_of_lading_id',$item->bolm_id)
    //             ->get();
                
    //             $item->{'cash_advance_voucher'} =   DB::table('cash_advance_child as cac')
    //             ->select('cac.id as id',
    //                 'cac.particular as particular_id',
    //                 'cac.other',
    //                 'cac.or_num as or_num',
    //                 'pm.particular as particular_name',
    //                 'cac.amount as amount',
    //                     'cac.paid')
    //             ->where('ca.bill_id',$item->bolm_id)
    //             ->leftJoin('cash_advance as ca', 'ca.id', '=', 'cac.cashadvance_id')
    //             ->leftJoin('particular_management as pm', 'pm.id', '=', 'cac.particular')
    //             ->get(); 


    //             $item->{'check_voucher'} =   DB::table('check_voucher_child as tvc')
    //             ->select('tvc.id as id',
    //                 'tvc.particular as particular_id',
    //                  'tvc.or_num as or_num',
    //                   'tvc.other',
    //                  'pm.particular as particular_name',
    //                 'tvc.amount as amount',
    //                     'tvc.paid')
    //             ->where('tx.pro_number',$item->bolm_id)
    //             ->leftJoin('check_voucher as tx', 'tx.id', '=', 'tvc.check_voucher_id')
    //             ->leftJoin('particular_management as pm', 'pm.id', '=', 'tvc.particular')
    //             ->get(); 

    //             // $item->{'liquidation_particulars'} =   DB::table('liquidation_particulars as lp')
    //             // ->select('lp.id as id',
    //             //     'pm.particular as particular_name',
    //             //     'lp.particular as particular_id',
    //             //     'lp.or_num as or_num',
    //             //     'lp.other',
    //             //     'lp.amount as amount',
    //             //     'lp.paid')
    //             // ->where('lp.liq_id',$item->id)
    //             // ->leftJoin('particular_management as pm', 'pm.id', '=', 'lp.particular')
    //             // ->get(); 
    //             // return $item;
    //         });
    //     return $y;


    // }

    public static function viewLiquidation($id)
    {

        $y = DB::table('liquidation as ld')
            ->where('ld.id', '=', $id)
            ->select(
                'ld.id',
                'ld.liquidation_num',
                'ld.cntr_num',
                'ld.date',
                'ld.cash_advance_id',
                'ld.expenses',
                'ld.cash_return',
                'ld.cash_refund',
                'ld.created_by',
                'ld.created_at',
                'ld.cash_advance_released as car',
                'bolm.id as bolm_id',
                'bolm.pro_number as pro_number',
                'bolm.bl_number as bl_number',
                'cm.consignee',
                'u.fname as u_fname',
                'u.lname as u_lname',
            )

            ->leftJoin('users as u', 'u.id', '=', 'ld.created_by')
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'ld.pro_number')
            ->leftJoin('consignee_management as cm', 'cm.id', '=', 'bolm.consignee_id')
            ->get()
            ->map(function($item){           
                $item->{'cntr'} =   DB::table('bill_of_lading_containers as bolc')
                ->select('*')
                ->where('bolc.bill_of_lading_id',$item->bolm_id)
                ->get();
        

                $item->{'liquidation_particulars'} =   DB::table('liquidation_particulars as lp')
                ->select('*')
                ->where('lp.liq_id',$item->id)
                ->leftJoin('liquidation as l', 'l.id', '=', 'lp.liq_id')
                ->leftJoin('particular_management as pm', 'pm.id', '=', 'lp.particular_id')
                ->get(); 
                return $item;
            });
        return $y;


    }
    public static function getLiquidationParticulars($id)
    {
        $y = DB::table('liquidation as l')
            ->where('l.id', '=', $id)
            ->select(
                'l.id as id',
                'l.pro_number as liq_pro_num')
            ->get()
            ->map(function($item){
                            
                $item->{'cash_advance'} =   DB::table('cash_advance_child as cac')
                ->select(
                    'cac.id as id',
                    'cac.particular as particular_id',
                    'cac.other',
                    'cac.or_num as or_num',
                    'pm.particular as particular_name',
                    'cac.amount as amount',
                    'cac.paid as paid_status'
                     )
                ->where('ca.bill_id',$item->liq_pro_num)
                // ->where('lb.type','cash_advance')
                // ->leftJoin('liquidation_breakdown as lb', 'lb.liq_particular', '=', 'cac.id')
                ->leftJoin('cash_advance as ca', 'ca.id', '=', 'cac.cashadvance_id')
                ->leftJoin('particular_management as pm', 'pm.id', '=', 'cac.particular')

                ->get(); 


                $item->{'check_voucher'} =   DB::table('check_voucher_child as tvc')
                ->select(
                    'tvc.id as id',
                    'tvc.particular as particular_id',
                    'tvc.other',
                    'tvc.or_num as or_num',
                     'pm.particular as particular_name',
                    'tvc.amount as amount',
                    'tvc.paid as paid_status'
                    )
                ->where('tx.pro_number',$item->liq_pro_num)
                // ->where('lb.type','check_voucher')
                // ->leftJoin('liquidation_breakdown as lb', 'lb.liq_particular', '=', 'tvc.id')
                ->leftJoin('check_voucher as tx', 'tx.id', '=', 'tvc.check_voucher_id')
                ->leftJoin('particular_management as pm', 'pm.id', '=', 'tvc.particular')  
                ->get();
                // ->map(function($item2){
                //     $item2->{'check_voucher_item'} =   DB::table('liquidation_breakdown')
                //                             ->where('liq_particular',$item2->id)
                //                             ->where('type','check_voucher')
                //                             ->get(); 
                //     return $item2;
                // });

                // $item->{'liquidation_particulars'} =   DB::table('liquidation_particulars as lp')
                // ->select('lp.id as id',
                //     'pm.particular as particular_name',
                //     'lp.particular as particular_id',
                //     'lp.other',
                //     'lp.amount as amount')
                // ->where('lp.liq_id',$item->id)
                // ->leftJoin('particular_management as pm', 'pm.id', '=', 'lp.particular')
                // ->get(); 

                return $item;
            });


        return $y;

    }



    public static function editLiquidation($x)
    {
        $y = DB::table('liquidation')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'pro_number'         => $x['bill_id'],
                    'updated_by'         => auth::user()->id,
                    'updated_at'         => date("Y-m-d H:i:s")
                    
                )
            );

        // if($y == true)
        // { 
            
        //     foreach ($x['particular_code'] as $key => $value) {
        //         if( isset($x['particular_code']) && !empty($x['particular_code']) ){
        //            $a = DB::table('liquidation_particulars')
        //            ->insert(
        //                array(
        //                    'liq_id'         => $x['id'],
        //                    'particular_id'  => $x['particular_code'][$key],
        //                    'or_num'         => $x['or_num'][$key],
        //                    'amount'         => $x['amount'][$key]
        //                )
        //            );
        //        }
               
               

        //    }
        // }
        // return $y;

    }
    
    
    // public static function deleteParticular( $x )
    // {
    //     $result = DB::table('liquidation_particulars')
    //         ->where('id', '=', $x['id'])
    //         ->delete();
    //     return $result;
    // }

    // public static function getParticular($x)
    // {
    //     $result = DB::table('liquidation_particulars')
    //         ->select('*')
    //         ->where('id', '=', $x['id'])
    //         ->get();
    //     return $result;
    // }

    // public static function updateParticular($x)
    // {
    //     $y = DB::table('liquidation_particulars')
    //         ->where('id', '=', $x['id'])
    //         ->update(
    //             array(
    //                 'particular_id'      => $x['edit_particular'],
    //                 'or_num'             => $x['edit_or_number'],
    //                 'amount'             => $x['edit_amount'],
    //             )
    //         );

        
    //     return $y;
    // }

    // public static function sumParticulars($id)
    // {
    //     $y = DB::table('liquidation_particulars as lp')
    //         ->selectRaw(
    //              'sum(lp.amount) as amount'
    //         )
    //         ->where('lp.liq_id', '=', $id)
    //         ->get();
    //     return $y;
    // }

    // public static function createbreakdownItem($x)
    // {
       
    //         foreach ($x['item'] as $key => $value) {
    //             if( isset($x['item']) && !empty($x['item']) ){
    //                $a = DB::table('liquidation_breakdown')
    //                ->insert(
    //                    array(
    //                        'liq_particular'  => $x['id'],
    //                        'item'            => $x['item'][$key],
    //                        'amount'          => $x['amount'][$key],

    //                        'created_by'      => auth::user()->id,
    //                        'created_at'      => date("Y-m-d H:i:s")
    //                    )
    //                );
    //            }
                      
    //        }
        
    //     return $a;
    // }


    public static function readLiquidated()
    {

        $y = DB::table('cash_advance as ca')
            ->select('ca.id as id',
                'ca.requested_amount as requested_amount',
                'ca.date as date',
                'ca.created_by as created_by',
                'bolm.pro_number as pro_number',
                'u.fname as u_fname',
                'u.lname as u_lname',
            )
            // ->where('ca.status','Released')
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'ca.bill_id')
           ->leftJoin('users as u', 'u.id', '=', 'ca.created_by')
            ->get();

        $z = DB::table('check_voucher as cv')
            ->select('cv.id as id',
                'cv.grand_amount as grand_amount',
                'cv.date as date',
                'cv.created_by as created_by',
                'bolm.pro_number as pro_number',
                'u.fname as u_fname',
                'u.lname as u_lname',
            )
            // ->where('cv.status','Released')
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'cv.pro_number')
           ->leftJoin('users as u', 'u.id', '=', 'cv.created_by')
            ->get();

            $cash_advance = collect($y);
            $check_voucher = collect($z);

            $mergeItem = $cash_advance->concat($check_voucher);

        return $mergeItem;
    }
        public static function readUnLiquidated()
    {

        $y = DB::table('cash_advance as ca')
            ->select('ca.id as id',
                'ca.requested_amount as requested_amount',
                'ca.date as date',
                'ca.pcv_number as pcv_number',
                'ca.created_by as created_by',
                'bolm.pro_number as pro_number',
                'u.fname as u_fname',
                'u.lname as u_lname',
            )
           
           ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'ca.bill_id')
           ->leftJoin('users as u', 'u.id', '=', 'ca.created_by')
          ->get();

        $z = DB::table('check_voucher as cv')
            ->select('cv.id as id',
                'cv.check_req_number as check_req_number',
                'cv.grand_amount as grand_amount',
                'cv.date as date',
                'cv.created_by as created_by',
                'bolm.pro_number as pro_number',
                'u.fname as u_fname',
                'u.lname as u_lname',
            )
       
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'cv.pro_number')
           ->leftJoin('users as u', 'u.id', '=', 'cv.created_by')
            ->get();

            $cash_advance = collect($y);
            $check_voucher = collect($z);

            $mergeItem = $cash_advance->concat($check_voucher);

        return $mergeItem;
    }

    
        public static function selectProcessor()
    {
         $x = DB::table('users as u')
           ->select('*' )
           ->where('role', '=', 5)
            ->get();
         return $x;
        
    }

        public static function getSelectedProcessorID($x)
    {

        $a = DB::table('users as u', 'u.id')
            ->select('*')
            ->where('u.id', $x['user_id'])
            ->get();
         return $a;

            // if( $x != null){
            //     $a = DB::table('bill_of_lading_management as bolm', 'bolm.id', '=', $x['bl_id'])
            //         ->select('*')
            //         ->leftJoin('cash_advance as ca', 'ca.bl_id', '=', 'bolm.id')
            //         // ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'cv.pro_number')
            //         // ->where('ca.status', '=','Released')
            //         // ->where('ca.created_by', $x['id'])
            //         ->get();
            //     return $a;
            //     // $a = DB::table('cash_advance as ca')
            //     //     ->select('*')
            //     //     ->leftJoin('processings as p', 'p.id', '=', 'cv.pro_number')
            //     //     ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'cv.pro_number')
            //     //     ->where('ca.status', '=','Released')
            //     //     ->where('ca.created_by', $x['id'])
            //     //     ->get();
            //     // return $a;

            // }
            // else{
            //  return false;
            // }
                      
    }

      public static function getReleasedCashAdvanceID($x)
    {

        $a = DB::table('cash_advance as ca')
            ->select('*')
            ->where('ca.id', $x['id'])
            ->get();
        return $a;
          
    }

      public static function getProcessingRequest($x)
    {

        $a = DB::table('processings as p')
            ->select('*')
            ->where('p.bill_of_lading_management_id', $x['bl_id'])
            ->where('p.release_status', 'Released')
            ->get();
        return $a;
          
    }
}