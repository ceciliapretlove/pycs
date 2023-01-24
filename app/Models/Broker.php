<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class Broker extends Model
{
    protected $table = 'check_voucher';
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

    public function checkVoucherChild()
    {
        return $this->hasMany(CheckVoucherChild::class,'check_voucher_id','id');
    }





// CUSTOM HERE
    public static function readTaxVoucher()
    {
         $x = DB::table('check_voucher as tv')
            ->select(
                'tv.id',
                'tv.date',
                'tv.amount',
                'tv.status',
                'tv.release_date',
                'tv.check_req_number',
                'tv.created_at',
                'bolm.customer_number',
                'bolm.pro_number',
                'ctm.code',
                'ctm.description',
                'u.fname as u_fname',
                'u.lname as u_lname'

            )
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'tv.pro_number')
            ->leftJoin('check_type_management as ctm', 'ctm.id', '=', 'tv.check_type')
            ->leftJoin('users as u', 'u.id', '=', 'tv.created_by')
            ->orderBy('tv.created_at', 'desc') 
            ->get();
         return $x;
        
    }



    public static function createTaxVoucher($x)
    {   
        if($x['non_pro'] == 'Yes')
        {
        $y = DB::table('check_voucher')
            ->insert(
                array( 
                    'pro_number'       => '',
                    'date'             => $x['date'],
                    'check_type'       => '',
                    'amount'           => $x['totalAmount'],
                    'grand_amount'     => $x['grand_total'],
                    'created_by'       => auth::user()->id,
                    'created_at'       => date("Y-m-d H:i:s")
                )  
            );
        }else{
            $y = DB::table('check_voucher')
            ->insert(
                array( 
                    'pro_number'       => $x['pro_number_id'],
                    'date'             => $x['date'],
                    'check_type'       => $x['check_type_id'],
                    'amount'           => $x['totalAmount'],
                    'grand_amount'     => $x['grand_total'],
                    'created_by'       => auth::user()->id,
                    'created_at'       => date("Y-m-d H:i:s")
                )  
            );
        }

            $check_req_id = DB::getPdo()->lastInsertId();
            $year = date("Y");       
            $check_req_no = $year.sprintf("%06d", $check_req_id);
            $z = DB::table('check_voucher')
                ->where('id', '=', $check_req_id)
                ->update(
                    array(
                        'check_req_number'   => $check_req_no
                    )
                );

            $d = DB::table('bill_of_lading_management')
                ->where('id', '=', $x['pro_number_id'])
                ->update(
                    array(
                        'checkvoucher_status'   => 1
                    )
                );
            foreach ($x['particular_code'] as $key => $value) {
                if($x['particular_code'][$key] != null){
                    if($x['particular_code'][$key] == 4){
                         $containerDepositValue = DB::table('bill_of_lading_management')
                        ->where('id', '=', $x['pro_number_id'])
                        ->update(
                            array(
                                'container_deposit'  => $x['amount'][$key], 
                            )
                        );
                    }
                   $a = DB::table('check_voucher_child')
                   ->insert( 
                       array(
                           'check_voucher_id'   => $check_req_id,
                           'particular'         => $x['particular_code'][$key],
                           'other'              => $x['other'][$key],
                           'amount'             => $x['amount'][$key],
                           'created_by'         => auth::user()->id,
                           'created_at'         => date("Y-m-d H:i:s")
                       )
                   );                        
                } 
            }  

        return $y;
    }

    public static function fetchTaxVoucher($id)
    {
        $y = DB::table('check_voucher as tv')
            ->select(
                'tv.amount', 
                'tv.grand_amount',
                'tv.date as date',
                'tv.pro_number as pro_number_id',      
                'tv.grand_amount as grand_amount',    
                'ctm.code as check_type_code',
                'ctm.description as check_type_description',
                'ctm.id as check_type_id',
                'cm.consignee',
                'bolm.customer_number',
                'bolm.pro_number as pro_number',

            )
            ->where('tv.id', '=', $id)
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'tv.pro_number')
            ->leftJoin('consignee_management as cm', 'cm.id', '=', 'bolm.consignee_id')
            ->leftJoin('check_type_management as ctm', 'ctm.id', '=', 'tv.check_type')
            ->get();
        return $y;
    }

    public static function fetchTaxVoucherParticular($id)
    {
        $y = DB::table('check_voucher_child as tvc')
            ->select(
                'tvc.id',
                'tvc.amount as amount',  
                'pm.id as particular_id',
                'pm.code as particular_code',
                'pm.particular as particular_description'

            )
            ->where('tvc.check_voucher_id', '=', $id)
            ->leftJoin('particular_management as pm', 'pm.id', '=', 'tvc.particular')

            ->get();
        return $y;
    }

    public static function fetchTaxVoucherAmount($id)
    {
        $y = DB::table('check_voucher_child as tvc')
            ->selectRaw(
                 'sum(tvc.amount) as amount'
            )
            ->where('tvc.check_voucher_id', '=', $id)
            ->get();
        return $y;
    }



    public static function updateTaxVoucher($x)
    {
        $y = DB::table('check_voucher')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'pro_number'       => $x['pro_number_id'],
                    'date'             => $x['date'],
                    'check_type'       => $x['check_type_id'],
                    
                    'updated_by'         => auth::user()->id,
                    'updated_at'         => date("Y-m-d H:i:s")

                )
            );

            foreach ($x['particular_code'] as $key => $value) {
                if($x['particular_code'][$key] != null){
                   $a = DB::table('check_voucher_child')
                   ->insert( 
                       array(
                           'check_voucher_id'     => $x['id'],
                           'particular'         => $x['particular_code'][$key],
                           'amount'             => $x['amount'][$key],
                           'created_by'         => auth::user()->id,
                           'created_at'         => date("Y-m-d H:i:s")
                       )
                   );
               }                              
            }    
        return $y;
    }

    public static function getTaxParticular($x)
    {
        $result = DB::table('check_voucher_child')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function updateTaxParticular($x)
    {
        $y = DB::table('check_voucher_child')
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

    public static function deleteTaxParticular( $x )
    {
        $result = DB::table('check_voucher_child')
            ->where('id', '=', $x['id'])
            ->delete();
        return $result;
    }

    public static function viewCheckPaymentRequestPDF($id)
    {
         $x = DB::table('check_voucher as tv')
            ->select(
            'tv.id',
            'tv.pro_number as pro_number_id',
            'tv.check_req_number',
            'tv.date',
            'tv.status',
            'ctm.description as check_type_description',
            'ctm.code as check_type_code',
            'bol.customer_number',
            'bol.pro_number',
            'prep.fname as prep_fname',
            'prep.lname as prep_lname',
            'tv.created_at',
            'cm.consignee as consignee_name'

        )
            ->where('tv.id', '=', $id)
            ->leftJoin('check_type_management as ctm', 'ctm.id', '=', 'tv.check_type')
            ->leftJoin('bill_of_lading_management as bol', 'bol.id', '=', 'tv.pro_number')
            ->leftJoin('consignee_management as cm', 'cm.id', '=', 'bol.consignee_id')
            ->leftJoin('users as prep', 'prep.id', '=', 'tv.created_by')
            ->get();
         return $x;
        
    }

    public static function releaseCheckPayment($x)
    {
        $result = DB::table('check_voucher')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 'Released',
                    'release_date' => date("Y-m-d H:i:s")
                )
            );
     
        return $result;
    }

    //PROCESSOR

    public static function readProcessor()
    {
         $x = DB::table('processor as p')
            ->select(
                'p.id',
                'p.date',
                'p.pro_number',
                'p.status',
                'ctm.code',
                'ctm.description'
          

            )
            ->leftJoin('check_type_management as ctm', 'ctm.id', '=', 'p.check_type')
            ->orderBy('p.id', 'desc') 
            ->paginate(10);
         return $x;
        
    }

    public static function createProcessorForm($x)
    {
        $y = DB::table('processor')
            ->insert(
                array( 
                    'pro_number'       => $x['pro_number'],
                    'date'             => $x['date'],
                    'check_type'       => $x['check_type_id'],
                    'status'           => 'For Releasing',

                    'created_by'       => auth::user()->id,
                    'created_at'       => date("Y-m-d H:i:s")
                )  
            );


            $processor_id = DB::getPdo()->lastInsertId();
          
            foreach ($x['particular_code'] as $key => $value) {
                if($x['particular_code'][$key] != null){
                   $a = DB::table('processor_child')
                   ->insert( 
                       array(
                           'processor_id'       => $processor_id,
                           'particular'         => $x['particular_code'][$key],
                           'amount'             => $x['amount'][$key],
                           'created_by'         => auth::user()->id,
                           'created_at'         => date("Y-m-d H:i:s")
                       )
                   );
               }                              
            }   

            $b = DB::table('bill_of_lading_management')
                ->where('pro_number', '=', $x['pro_number'])
                ->update(
                    array(
                        'processor_status'   => '1'
                    )
                );

        return $y;
    }
    
    
    public static function fetchProcessor($id)
    {
        $y = DB::table('processor as p')
            ->select(
                'p.id', 
                'p.date',          
                'p.pro_number',
                'ctm.code as check_type_code',
                'ctm.description as check_type_description',
                'ctm.id as check_type_id',

            )
            ->where('p.id', '=', $id)
            ->leftJoin('check_type_management as ctm', 'ctm.id', '=', 'p.check_type')
            ->get();
        return $y;
    }

    public static function fetchProcessParticular($id)
    {
        $y = DB::table('processor_child as pc')
            ->select(
                'pc.id',
                'pc.amount',        
                'pm.id as particular_id',
                'pm.code as particular_code',
                'pm.particular as particular_description'

            )
            ->where('pc.processor_id', '=', $id)
            ->leftJoin('particular_management as pm', 'pm.id', '=', 'pc.particular')

            ->get();
        return $y;
    }

    public static function fetchProcessorAmount($id)
    {
        $y = DB::table('processor_child as pc')
            ->selectRaw(
                 'sum(pc.amount) as amount'
            )
            ->where('pc.processor_id', '=', $id)
            ->get();
        return $y;
    }

    public static function updateProcessorForm($x)
    {
        $y = DB::table('processor')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'pro_number'       => $x['pro_number'],
                    'date'             => $x['date'],
                    'check_type'       => $x['check_type_id'],
                    'status'           => 'For Releasing',

                    'updated_by'         => auth::user()->id,
                    'updated_at'         => date("Y-m-d H:i:s")

                )
            );

            foreach ($x['particular_code'] as $key => $value) {
                if($x['particular_code'][$key] != null){
                   $a = DB::table('processor_child')
                   ->insert( 
                       array(
                           'processor_id'       => $x['id'],
                           'particular'         => $x['particular_code'][$key],
                           'amount'             => $x['amount'][$key],
                           'created_by'         => auth::user()->id,
                           'created_at'         => date("Y-m-d H:i:s")
                       )
                   );
               }                              
            }    
        return $y;
    }

    public static function getProcessorParticular($x)
    {
        $result = DB::table('processor_child')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function updateProcessorParticular($x)
    {
        $y = DB::table('processor_child')
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

    public static function deleteProcessor( $x )
    {
        $result = DB::table('processor_child')
            ->where('id', '=', $x['id'])
            ->delete();
        return $result;
    }
 
}