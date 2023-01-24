<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class CashAdvance extends Model
{
    protected $table = 'cash_advance';
    protected $primaryKey = 'id';


    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::guard('web')->user()->id;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::guard('web')->user()->id;
        });
    }
    // ELOQUENT HERE

    public function CashAdvanceChild()
    {
        return $this->hasMany(CashAdvanceChild::class,'cashadvance_id','id');
    }


	public static function createCashAdvance($x)
	{

	
	        $y = DB::table('cash_advance')
	            ->insert(
	                array(
	                
	                    'bill_id'            => $x['pro_number_id'],
	                    'requested_amount'   => $x['request_amount'],
                        'remarks'            => $x['remarks'],
                        'date'               => $x['date'],
                        'received_by'        => auth::user()->id,
	                    'created_by'         => auth::user()->id,
	                    'created_at'         => date("Y-m-d H:i:s")

	                )
	            );
	        
            $cashadvance_id = DB::getPdo()->lastInsertId();
            $year = substr( date("Y"), -2 );        
            $pcv = 'PCV'.$year.'-'. sprintf("%05d", $cashadvance_id);
            $z = DB::table('cash_advance')
                ->where('id', '=', $cashadvance_id)
                ->update(
                    array(
                        'pcv_number'   => $pcv
                    )
                );

            // foreach ($x['particular_code2'] as $key => $value) {
            //     if($x['particular_code2'][$key] != null){
            //        $a = DB::table('cash_advance_child')
            //        ->insert( 
            //            array(
            //                'cashadvance_id'     => $cashadvance_id,
            //                'particular'         => $x['particular_code2'][$key],
            //                'or_num'             => $x['or_num'][$key],
            //                'other'              => $x['other'][$key],
            //                'amount'             => $x['amount'][$key],
            //                'created_by'         => auth::user()->id,
            //                'created_at'         => date("Y-m-d H:i:s")
            //            )
            //        );
            //    }                              
            // }   
            
            // $b = DB::table('bill_of_lading_management')
            //     ->where('id', '=', $x['bl_id'])
            //     ->update(
            //         array(
            //             'cashadvance_status'   => '1'
            //         )
            // );

	        return $y;
	}

    public static function readCashAdvance()
    {
         $x = DB::table('cash_advance as ca')
            ->select('ca.id as id',
                     'ca.pcv_number',
                     'ca.bill_id',
                     'ca.requested_amount',
                     'ca.received_amount',
                     'ca.status',
                     'ca.remarks',
                     'ca.created_at',
                     'ca.created_by as received_by',
                     'ca.received_by',
                     'ca.release_date',
                     'u.fname as u_fname',
                     'u.lname as u_lname',
                     'bolm.pro_number as pro_number',
                     'bolm.customer_number as customer_number')
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'ca.bill_id')
            ->leftJoin('users as u', 'u.id', '=', 'ca.created_by')
            ->orderBy('bolm.pro_number', 'desc')
            ->get();
         return $x;

        
    }


    public static function viewCashAdvance($id)
    {
        $y = DB::table('cash_advance as ca')
            ->select('ca.id as id',
                  'ca.pcv_number',
                  'ca.bill_id',
                  'ca.requested_amount',
                  'ca.received_amount',
                  'ca.remarks',
                  'ca.status',                  
                  'ca.created_at',
                  'ca.created_by as received_by',
                  'ca.received_by',
                  'bolm.customer_number',
                  'bolm.pro_number',
                  'bolm.estimated_time_arrival as eta',
                  'bolm.pro_number as pro_number',
                  'bolm.estimated_time_arrival',
                  'bolm.created_by as processor',
                  'bolm.pro_number as bill_id',
                  'bolm.bl_number as bl_number',
                  'cm.consignee',
                  'u.fname as receiver_fname',
                  'u.lname as receiver_lname',
                  'u.fname as processor_fname',
                  'u.lname as processor_lname')
            ->where('ca.id', '=', $id)
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'ca.bill_id')
            ->leftJoin('consignee_management as cm', 'cm.id', '=', 'bolm.consignee_id')
            ->leftJoin('users as u', 'u.id', '=', 'ca.created_by')
            ->leftJoin('users as u1', 'u1.id', '=', 'bolm.created_by')
            ->get();
        return $y;
    }


    public static function getCashAdvance($id)
    {
         $x = DB::table('cash_advance')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
         return $x;
        
    }

   
  public static function fetchCashAdvance($id)
    {
        $y = DB::table('cash_advance as ca')
            ->select(
                'ca.id',
                'ca.pcv_number',
                'ca.bill_id',
                'ca.requested_amount',
                'ca.received_amount',
                'ca.status',
                'ca.remarks',
                'ca.date',
                'bolm.pro_number',
                'cm.consignee',
                'u.fname as processor_fname',
                'u.lname as processor_lname'

            )
            ->where('ca.id', '=', $id)
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'ca.bill_id')
            ->leftJoin('consignee_management as cm', 'cm.id', '=', 'bolm.consignee_id')
            ->leftJoin('users as u', 'u.id', '=', 'ca.created_by')
            ->get();
        return $y;
    }

    public static function fetchCashAdvanceParticular($id)
    {
        $y = DB::table('cash_advance_child as cac')
            ->select(
                'cac.id',
                'cac.amount',  
                'cac.other',      
                'pm.id as particular_id',
                'pm.code as particular_code',
                'pm.particular as particular_description'

            )
            ->where('cac.cashadvance_id', '=', $id)
            ->leftJoin('particular_management as pm', 'pm.id', '=', 'cac.particular')

            ->get();
        return $y;
    }

    public static function fetchCashAdvanceAmount($id)
    {
        $y = DB::table('cash_advance_child as cac')
            ->selectRaw(
                 'sum(cac.amount) as amount'
            )
            ->where('cac.cashadvance_id', '=', $id)
            ->get();
        return $y;
    }

    public static function getCashAdvanceParticular($x)
    {
        $result = DB::table('cash_advance_child')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

        public static function updateCashAdvanceParticular($x)
    {
        $y = DB::table('cash_advance_child')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'particular'         => $x['edit_particular'],
                    'amount'             => $x['edit_amount'],
                    
                    'updated_by'         => auth::user()->id,
                    'updated_at'         => date("Y-m-d H:i:s")

                )
            );

        
        return $y;
    }

    public static function deleteCashAdvanceParticular( $x )
    {
        $result = DB::table('cash_advance_child')
            ->where('id', '=', $x['id'])
            ->delete();
        return $result;
    }

    public static function updateCashAdvance($x)
    {
        $y = DB::table('cash_advance')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'bill_id'        => $x['pro_number_id'],
                    'requested_amount'   => $x['request_amount'],
                    // 'received_amount'    => $x['addtotalAmount'],
                    'date'               => $x['date'],
                    'remarks'            => $x['remarks'],
                    'updated_by'         => auth::user()->id,
                    'updated_at'         => date("Y-m-d H:i:s")

                )
            );

            // foreach ($x['particular_code2'] as $key => $value) {
            //     if($x['particular_code2'][$key] != null){
            //        $a = DB::table('cash_advance_child')
            //        ->insert( 
            //            array(
            //                'cashadvance_id'     => $x['id'],
            //                'particular'         => $x['particular_code2'][$key],
            //                'other'              => $x['other'][$key],
            //                'amount'             => $x['amount'][$key],
            //                'created_by'         => auth::user()->id,
            //                'created_at'         => date("Y-m-d H:i:s")
            //            )
            //        );
            //    }                              
            // }    
        return $y;
    }
public static function releaseCashadvance($x)
    {
        $y = DB::table('cash_advance')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 'Released',
                    'release_date' => date("Y-m-d H:i:s")
                )
            );
  
        return $y;
    }


}