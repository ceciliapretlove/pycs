<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class BillOfLading extends Model
{
    protected $table = 'bill_of_lading_management';

    public static function read()
    {
        $x = DB::table('bill_of_lading_management as bolm')
            ->select(
                'bolm.id',
                'bolm.pro_number',
                'bolm.consignee_id',
                'bolm.shipper_id',
                'bolm.bl_number',
                'bolm.customer_number',    
                'bolm.date',
                'c.consignee',
                's.shipper'
            )
            ->leftJoin('port_management as pml', 'pml.id', '=', 'bolm.port_loading')
            ->leftJoin('port_management as pmd', 'pmd.id', '=', 'bolm.port_discharge')
            ->leftJoin('consignee_management as c', 'c.id', '=', 'bolm.consignee_id')
            ->leftJoin('shipper_management as s', 's.id', '=', 'bolm.shipper_id')
            ->orderBy('bolm.pro_number', 'desc')
            ->get();
        return $x;
    }

    public static function filterEquipmentListOnView($x)
    {
        $x = DB::table('equipment as eq')
            ->where('eq.equipment_type', '=', $x['id'])
            ->select(
                'eq.id',
                'eq.equipment_category as equipment_category_id',
                'eq.equipment_type as equipment_type_id',
                'eq.equipment_id',
                'eq.brand',
                'eq.model',
                'eq.year_model',
                'eq.chassis_number',
                'eq.plate_number',
                'eq.engine_model',
                'eq.purchase_amount',
                'eq.purchase_date',
                'eq.net_capacity',
                'eq.other_descriptors',
                'eq.odometer_on_register',
                'eq.pms_type as pms_type_id',
                'eq.created_at',
                'eq.updated_at',
                'eq.last_pms',
                'eq.pms_status',
                'eq.status',
                'loc.location',
                'c.fname as cb_fname',
                'c.lname as cb_lname',
                'u.fname as ub_fname',
                'u.lname as ub_lname',
                'pmv.pms_main as pms_type',
                'ec.type as equipment_category',
                'et.equipment_type'
            )
            ->leftJoin('location as loc', 'loc.id', '=', 'eq.current_location')
            ->leftJoin('users as c', 'c.id', '=', 'eq.created_by')
            ->leftJoin('users as u', 'u.id', '=', 'eq.updated_by')
            ->leftJoin('pms_main_var as pmv', 'pmv.id', '=', 'eq.pms_type')
            ->leftJoin('equipment_category as ec', 'ec.id', '=', 'eq.equipment_category')
            ->leftJoin('equipment_type as et', 'et.id', '=', 'eq.equipment_type')
            ->get();
        return $x;
    }


    public static function createBillOfLading($x)
    {
        $y = DB::table('bill_of_lading_management')
            ->insert(
                array(
                    'date'                   => $x['date'], 
                    'pro_number'             => $x['pro_number'],
                    'shipper_id'             => $x['shipper_id'],
                    'shipping_line'          => $x['shipping_line_id'],
                    'port_discharge'         => $x['port_discharge'],
        
                    'consignee_id'           => $x['consignee_id'],
                    'vessel'                 => $x['vessel'],
                    'port_loading'           => $x['port_loading'],
                   

                    'customer_number'        => $x['customer_number'],
                    'voyage_number'          => $x['voyage_number'],
                    'description'            => $x['description'],

                    'bl_number'              => $x['bl_number'],
                    'gross_weight'           => $x['gross_weight'],
                    'estimated_time_arrival' => $x['eta'],   



                    'created_by'         => auth::user()->id,
                    'created_at'         => date("Y-m-d H:i:s")

                )
            );

            // $year = substr( date("Y"), -2 );        
            // $pro_num = 'MAS'.$year.'-'. sprintf("%05d", $bill_id);
            // $z = DB::table('bill_of_lading_management')
            //     ->where('id', '=', $bill_id)
            //     ->update(
            //         array(
            //             'pro_number'   => $pro_num
            //         )
            //     );

            
            $bill_id = DB::getPdo()->lastInsertId();
            foreach ($x['container_number'] as $key => $value) {
                if($x['container_number'][$key] != null){
                   $a = DB::table('bill_of_lading_containers')
                   ->insert( 
                       array(
                           'bill_of_lading_id'  => $bill_id,
                           'container_number'   => $x['container_number'][$key],
                           'size'               => $x['container_size'][$key]
                       )
                   );
               }                              
            }    

        return $y;
    }

    public static function fetchBillOfLadingDetails($id)
    {
        $y = DB::table('bill_of_lading_management as bolm')
            ->select(
                'bolm.id',
                'bolm.pro_number',
                'bolm.date',
                'bolm.created_at',
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
            ->get();
        return $y;
    }

    public static function fetchBillContainerDetails($id)
    {
        $y = DB::table('bill_of_lading_containers')
            ->select('*')
            ->where('bill_of_lading_id', '=', $id)
            ->get();
        return $y;
    }

    public static function updateBillOfLading($x)
    {
        $y = DB::table('bill_of_lading_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'date'                   => $x['date'],

                    'shipper_id'             => $x['shipper_id'],
                    'shipping_line'          => $x['shipping_line_id'],
                    'port_discharge'         => $x['port_discharge'],

                    'consignee_id'           => $x['consignee_id'],
                    'vessel'                 => $x['vessel'],
                    'port_loading'           => $x['port_loading'],
                   

                    'customer_number'        => $x['customer_number'],
                    'voyage_number'          => $x['voyage_number'],
                    'description'            => $x['description'],

                    'bl_number'              => $x['bl_number'],
                    'gross_weight'           => $x['gross_weight'],
                    'estimated_time_arrival' => $x['eta'],


                    'updated_by'         => auth::user()->id,
                    'updated_at'         => date("Y-m-d H:i:s")

                )
            );
     
            foreach ($x['container_number'] as $key => $value) {
                if($x['container_number'][$key] != null){
                   $a = DB::table('bill_of_lading_containers')
                   ->insert( 
                       array(
                           'bill_of_lading_id'  => $x['id'],
                           'container_number'   => $x['container_number'][$key],
                           'size'               => $x['container_size'][$key]
                       )
                   );
               }                              
            }
        return $y;
    }
    
    public static function deleteContainer( $x )
    {
        $result = DB::table('bill_of_lading_containers')
            ->where('id', '=', $x['id'])
            ->delete();
        return $result;
    }

    public static function getContainer($x)
    {
        $result = DB::table('bill_of_lading_containers')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function updateContainer($x)
    {
        $y = DB::table('bill_of_lading_containers')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'container_number'   => $x['edit_contaniner_number'],
                    'size'               => $x['edit_size'],
                    // 'container_deposit'  => $x['edit_container_deposit'],
                    // 'empty_return'       => $x['edit_empty_return'],
                    // 'trucker'            => $x['edit_trucker'],
                    'updated_by'         => auth::user()->id,
                    'updated_at'         => date("Y-m-d H:i:s")

                )
            );

        
        return $y;
    }
}

