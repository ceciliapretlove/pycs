<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class PreventiveMaintenance extends Model
{
    public static function readEquipmentOnWarning()
    {
        $x = DB::table('equipment as eq')
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
                'eq.pms_last_used',
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
            ->where('eq.pms_status', '=', 'Needs PMS')
            ->get();
        return $x;
    }

    public static function readEquipmentOnWarningDone()
    {
        $x = DB::table('equipment as eq')
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
                'eq.pms_last_used',
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
            ->where('eq.last_pms', '!=', null)
            ->limit(10)
            ->get();
        return $x;
    }

    public static function readSelectedEquipment($id)
    {
        $x = DB::table('equipment as eq')
            ->where('eq.id', '=', $id)
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
                'eq.pms_last_used',
                'eq.status',
                'eq.running_km',
                'eq.running_hr',
                'eq.current_km',
                'eq.current_hr',
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

    public static function readAllWarehouseItem()
    {
        $w = DB::table('warehouse_inventory')
            ->where('moving_qty', '!=', '0')
            ->where('status', '!=', '1')
            ->get();
        return $w;
    }

    public static function readPMSMaterialsBaseOnRequirements($id)
    {
        $x = DB::table('equipment')
            ->where('id', '=', $id)
            ->get();

        $n = $x[0]->pms_last_used;

        $i = DB::table('pms_type_item as pti')
            ->where('pti.pms_id', '=', $n)
            ->leftJoin('warehouse_inventory as wi', 'wi.id', '=', 'pti.warehouse_item')
            ->select(
                'pti.id',
                'pti.amount as qty',
                'wi.id as wi_item',
                'wi.item_id',
                'wi.serial_id',
                'wi.item_name',
                'wi.brand',
                'wi.conditions',
                'wi.unit',
                'wi.moving_qty',
                'wi.purchased_price'
            )
            ->get();
        return $i;
    }

    public static function getWarehouseItem($x)
    {
        $w = DB::table('warehouse_inventory')
            ->where('id', '=', $x['id'])
            ->get();
        return $w;
    }

    public static function createJobOrder($x)
    {
        
        $j = DB::table('job_order')
            ->insert(
                array(
                    'diagnostics_id'        => $x['diagnostics_id'],
                    'pms_used'              => $x['pms_used'],
                    'equipment_id'          => $x['equipment_id'],
                    'equipment_category'    => $x['equipment_category'],
                    'equipment_type'        => $x['equipment_type'],
                    'reported_by'           => $x['reported_by'],
                    'reported_date'         => $x['reported_date'],
                    'location'              => $x['location'],
                    'labor_type'            => $x['labor_type'],
                    'running_km'            => $x['running_km'],
                    'running_hr'            => $x['running_hr'],
                    'problems_encountered'  => $x['problems_encountered'],
                    'inspected_by'          => $x['inspected_by'],
                    'details_of_work_done'  => $x['details_of_work_done'],
                    'conducted_by'          => $x['conducted_by'],
                    'labor_date_started'    => $x['labor_date_started'],
                    'labor_time_started'    => $x['labor_time_started'],
                    'labor_date_completed'  => $x['labor_date_completed'],
                    'labor_time_completed'  => $x['labor_time_completed'],
                    'trial_result'          => $x['trial_result'],
                    'trial_personnel'       => $x['trial_personnel'],
                    'trial_at'              => $x['trial_at']
                )
            );

        $joPid = DB::getPdo()->lastInsertId();
        if($j == true){
            foreach($x['item_id'] as $key => $value) {
                DB::table('job_order_item')
                    ->insert(
                        array(
                            'jo_main'               => $joPid,
                            'item_id'               => $x['item_id'][$key],
                            'qty'                   => $x['qty'][$key],
                            'unit'                  => $x['unit'][$key],
                            'purchased_price'       => $x['purchased_price'][$key],
                        )
                    );
            }

            $eU = DB::table('equipment')
            ->where('id', '=', $x['equipment_id'])
            ->update(
                array(
                    'status'                => 'On Maintenance/Repair'
                )
            );

            $notif = DB::table('notification')
                ->where('module', '=', 'Preventive Maintenance Warning')
                ->where('module_id', '=', $x['equipment_id'])
                ->update(
                    array(
                        'requested_action'  => 'Completed',
                        'done_by'           => auth::user()->id,
                        'done_at'           => date("Y-m-d H:i:s"),
                        'status'            => 'Completed'
                    )
                );

            $eF = DB::table('equipment')
            ->where('id', '=', $x['equipment_id'])
            ->get();

            $jobNf = DB::table('notification')
                ->insert(
                    array(
                        'module'            => 'Ongoing JO',
                        'tag'               => 'for '.$eF[0]->brand.'-'.$eF[0]->equipment_id,
                        'module_id'         => $joPid,
                        'url'               => 'viewJobOrder=kgTcLtGsKT'.$joPid.'HmYYKpuQykDbTVqaWGFfPnMKncnxTmbutcMexHe',
                        'requested_action'  => 'For Checking',
                        'requested_by'      => auth::user()->id,
                        'requested_at'      => date("Y-m-d H:i:s")
                    )
            );
        }
        return $j;
    }

	// public static function getFleetInfo($id)
 //    {
 //        $x = DB::table('fleet as fl')
 //            ->select(
 //                'fl.id',
 //                'fl.equipment_id',
 //                'fl.fleet_type as fleet_type_id',
 //                'fl.model',
 //                'fl.plate_number',
 //                'fl.chassis_number',
 //                'fl.odometer_on_register',
 //                'fl.color',
 //                'fl.gas_type',

 //                'fl.registered_branch',
 //                'fl.registration_date',
 //                'fl.expiration',

 //                'fl.purchase_vendor_branch',
 //                'fl.purchase_date',
 //                'fl.purchase_amount',

 //                'fl.pms_type as pms_type_id',
 //                'fl.pms_kilometer',
 //                'fl.pms_hour',
 //                'fl.pms_date',
 //                'fl.pms_odometer',
 //                'fl.created_at',
 //                'fl.status',
 //                'ft.type as fleet_type',
                
 //                'fl.odometer_current',
 //                'fl.km_current',
 //                'fl.hr_current',
                
 //                'fl.current_location',
 //                'pmst.pms_type as pms_type'
 //            )
 //            ->leftJoin('fleet_type as ft', 'ft.id', '=', 'fl.fleet_type')
 //            ->leftJoin('pms_type as pmst', 'pmst.id', '=', 'fl.pms_type')
 //            ->where('fl.id', '=', $id)
 //            ->get();
 //        return $x;
 //    }

 //    public static function getFleetRequiredItem($fleetType)
 //    {
 //        $y = DB::table('pms_type_item as pti')
 //            ->select(
 //                'pti.id',
 //                'pti.pms_id',
 //                'wi.item_id',
 //                'wi.brand',
 //                'wi.serial_id',
 //                'wi.item_name',
 //                'wi.unit',
 //                'wi.purchased_price as amount',
 //                'pti.amount as qty'
 //            )
 //            ->where('pms_id', '=', $fleetType)
 //            ->leftJoin('warehouse_inventory as wi', 'wi.id', '=', 'pti.warehouse_item')
 //            ->get();
 //        return $y;
 //    }

 //    public static function createJobOrder($x)
 //    {
 //        $f = DB::table('fleet')
 //            ->where('id', '=', $x['fleet_equipment'])
 //            ->update(
 //                array(
 //                    'status'                => 'On Maintenance/Repair',
 //                    'current_location'      => null
 //                )
 //            );

 //        $y = DB::table('job_order')
 //            ->insert(
 //                array(
 //                    'fleet_equipment'       => $x['fleet_equipment'],
 //                    'job_order_date'        => $x['job_order_date'],
 //                    'driver_operator'       => $x['driver_operator'],
 //                    'job_order_no'          => $x['job_order_no'],
 //                    'location'              => $x['location'],
 //                    'labor_type'            => $x['labor_type'],
 //                    'problems_encountered'  => $x['problems_encountered'],
 //                    'inspected_by'          => $x['inspected_by'],
 //                    'details_of_work_done'  => $x['details_of_work_done'],
 //                    'conducted_by'          => $x['conducted_by'],
 //                    'labor_date_started'    => $x['labor_date_started'],
 //                    'labor_date_completed'  => $x['labor_date_completed'],
 //                    'labor_time_started'    => $x['labor_time_started'],
 //                    'labor_time_completed'  => $x['labor_time_completed'],
 //                    'trial_personnel'       => $x['trial_personnel'],
 //                    'trial_date'            => $x['trial_date'],
 //                    'trial_result'          => $x['trial_result'],
 //                    'accepted_by'           => $x['accepted_by'],
 //                    'accepted_date'         => $x['accepted_date'],
 //                    'noted_by'              => $x['noted_by'],
 //                    'noted_date'            => $x['noted_date'],
 //                    'status'                => 'On going'

 //                )
 //            );
 //        $joLID = DB::getPdo()->lastInsertId();
 //        if( isset($x['pms_id']) && !empty($x['pms_id']) ){
 //            foreach($x['pms_id'] as $key => $value) {
 //                DB::table('job_order_item')
 //                    ->insert(
 //                        array(
 //                            'jo_main'               => $joLID,
 //                            'pms_type_item_id'      => $x['pms_id'][$key],
 //                            'qty'                   => $x['qty'][$key],
 //                            'unit'                  => $x['unit'][$key],
 //                            'reference_id'          => $x['reference_id'][$key],
 //                            'amount'                => $x['amount'][$key],
 //                        )
 //                    );
 //            }
 //        }
 //        return $y;
 //    }

 //        public static function readWarehouseItem()
 //    {
 //        $y = DB::table('warehouse_inventory')
 //            ->select('*')
 //            ->get();
 //        return $y;
 //    }

 //        public static function getWarehouseItem($x)
 //    {
 //        $y = DB::table('warehouse_inventory')
 //            ->select('*')
 //            ->where('id', '=', $x['id'])
 //            ->get();
 //        return $y;
 //    }

    
}