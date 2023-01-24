<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class Fleet extends Model
{
    public static function read()
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

    public static function getEquipmentTypeBaseOnCategory($x)
    {
        $z = DB::table('equipment_type')
            ->select('*')
            ->where('equipment_category', '=', $x['id'])
            ->get();
        return $z;
    }

    public static function checkIfPlateNumberEnabled($x)
    {
        $z = DB::table('equipment_category')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $z;
    }

    public static function createEquipmentRegistration($x)
    {
        $y = DB::table('equipment')
            ->insert(
                array(
                    'equipment_category'        => $x['equipment_category'],
                    'equipment_type'            => $x['equipment_type'],
                    'equipment_id'              => $x['equipment_id'],

                    'brand'                     => $x['brand'],
                    'model'                     => $x['model'],
                    'year_model'                => $x['year_model'],

                    'chassis_number'            => $x['chassis_number'],
                    'plate_number'              => $x['plate_number'],
                    'engine_model'              => $x['engine_model'],

                    'purchase_amount'           => $x['purchase_amount'],
                    'purchase_date'             => $x['purchase_date'],
                    'odometer_on_register'      => $x['registration_odomoter'],

                    'net_capacity'              => $x['net_capacity'],
                    'other_descriptors'         => $x['other_descriptors'],

                    'pms_type'                  => $x['pms_type'],

                    'current_odometer'          => $x['registration_odomoter'],
                    'running_odometer'          => $x['registration_odomoter'],
                    'current_km'                => $x['registration_odomoter'],
                    'running_km'                => $x['registration_odomoter'],

                    'created_by'                => auth::user()->id,
                    'created_at'                => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function fetchEquipmentDetails($id)
    {
        $y = DB::table('equipment')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        return $y;
    }

    public static function editEquipmentRegister($x)
    {
        $y = DB::table('equipment')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'equipment_category'        => $x['equipment_category'],
                    'equipment_type'            => $x['equipment_type'],
                    'equipment_id'              => $x['equipment_id'],

                    'brand'                     => $x['brand'],
                    'model'                     => $x['model'],
                    'year_model'                => $x['year_model'],

                    'chassis_number'            => $x['chassis_number'],
                    'plate_number'              => $x['plate_number'],
                    'engine_model'              => $x['engine_model'],

                    'purchase_amount'           => $x['purchase_amount'],
                    'purchase_date'             => $x['purchase_date'],
                    'odometer_on_register'      => $x['registration_odomoter'],

                    'net_capacity'              => $x['net_capacity'],
                    'other_descriptors'         => $x['other_descriptors'],

                    'pms_type'                  => $x['pms_type'],

                    'current_odometer'          => $x['registration_odomoter'],
                    'updated_by'                => auth::user()->id,
                    'updated_at'                => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }
    
    public static function readMainDetails($id)
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
                'eq.running_odometer',
                'eq.running_hr',
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
}