<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class JobOrder extends Model
{
	public static function read()
	{
		$x = DB::table('job_order as jo')
			->leftJoin('equipment as eq', 'eq.id', '=', 'jo.equipment_id')
			->leftJoin('equipment_category as ec', 'ec.id', '=', 'jo.equipment_category')
			->leftJoin('equipment_type as et', 'et.id', '=', 'jo.equipment_type')
			->leftJoin('users as reported', 'reported.id', '=', 'jo.reported_by')
			->leftJoin('location as loc', 'loc.id', '=', 'jo.location')
			->leftJoin('users as inspected', 'inspected.id', '=', 'jo.inspected_by')
			->leftJoin('users as conducted', 'conducted.id', '=', 'jo.conducted_by')
			->leftJoin('users as trial_personnel', 'trial_personnel.id', '=', 'jo.trial_personnel')
			->leftJoin('users as accepted', 'accepted.id', '=', 'jo.accepted_by')
			->leftJoin('users as noted', 'noted.id', '=', 'jo.noted_by')
			->leftJoin('pms_type as pt', 'pt.id', '=', 'jo.pms_used')
			->leftJoin('pms_main_var as pmv', 'pmv.id', '=', 'pt.pms_main_var')
			->select(
				'jo.id',
				'jo.diagnostics_id',
				'jo.reported_date',
				'jo.labor_type',
				'jo.running_km',
				'jo.running_hr',
				'jo.problems_encountered',
				'jo.details_of_work_done',
				'jo.labor_date_started',
				'jo.labor_time_started',
				'jo.labor_date_completed',
				'jo.labor_time_completed',
				'jo.trial_result',
				'jo.trial_at',
				'jo.accepted_at',
				'jo.noted_at',
				'jo.status',
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
				'ec.type as equipment_category',
				'et.equipment_type',
				'reported.fname as reported_fname',
				'reported.lname as reported_lname',
				'loc.location',
				'inspected.fname as inspected_fname',
				'inspected.lname as inspected_lname',
				'conducted.fname as conducted_fname',
				'conducted.lname as conducted_lname',
				'trial_personnel.fname as trial_personnel_fname',
				'trial_personnel.lname as trial_personnel_lname',
				'accepted.fname as accepted_fname',
				'accepted.lname as accepted_lname',
				'noted.fname as noted_fname',
				'noted.lname as noted_lname',
				'pt.pms_milestone',
				'pmv.pms_main'
			)
		->get();
		return $x;
	}

	public static function getPrimary($id)
	{
		$x = DB::table('job_order')
			->where('id', '=', $id)
			->get();
		return $x;
	}

	public static function getSecondary($id)
	{
        $y = DB::table('job_order_item as joi')
            ->select(
                'joi.id',
                'joi.item_id',
                'joi.qty',
                'joi.unit',
                'joi.purchased_price',
                'wi.item_id as information_id',
                'wi.brand',
                'wi.serial_id',
                'wi.item_name',
            )
            ->where('joi.jo_main', '=', $id)
            ->leftJoin('warehouse_inventory as wi', 'wi.id', '=', 'joi.item_id')
            ->get();
        return $y;
    }

    public static function updateJobOrder($x)
    {
    	$j = DB::table('job_order')
    		->where('id', '=', $x['id'])
            ->update(
                array(
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

        if( isset($x['item_id']) && !empty($x['item_id']) ){
	    	foreach($x['item_id'] as $key => $value) {
	            DB::table('job_order_item')
	                ->insert(
	                    array(
	                        'jo_main'               => $x['id'],
	                        'item_id'               => $x['item_id'][$key],
	                        'qty'                   => $x['qty'][$key],
	                        'unit'                  => $x['unit'][$key],
	                        'purchased_price'       => $x['purchased_price'][$key],
	                    )
	                );
	        }
	    }
        return $j;
    }

    public static function getPrimaryFull($id)
	{
		$x = DB::table('job_order as jo')
			->where('jo.id', '=', $id)
			->leftJoin('equipment as eq', 'eq.id', '=', 'jo.equipment_id')
			->leftJoin('equipment_category as ec', 'ec.id', '=', 'jo.equipment_category')
			->leftJoin('equipment_type as et', 'et.id', '=', 'jo.equipment_type')
			->leftJoin('users as reported', 'reported.id', '=', 'jo.reported_by')
			->leftJoin('location as loc', 'loc.id', '=', 'jo.location')
			->leftJoin('users as inspected', 'inspected.id', '=', 'jo.inspected_by')
			->leftJoin('users as conducted', 'conducted.id', '=', 'jo.conducted_by')
			->leftJoin('users as trial_personnel', 'trial_personnel.id', '=', 'jo.trial_personnel')
			->leftJoin('users as accepted', 'accepted.id', '=', 'jo.accepted_by')
			->leftJoin('users as noted', 'noted.id', '=', 'jo.noted_by')
			->leftJoin('pms_type as pt', 'pt.id', '=', 'jo.pms_used')
			->leftJoin('pms_main_var as pmv', 'pmv.id', '=', 'pt.pms_main_var')
			->select(
				'jo.id',
				'jo.diagnostics_id',
				'jo.reported_date',
				'jo.labor_type',
				'jo.running_km',
				'jo.running_hr',
				'jo.problems_encountered',
				'jo.details_of_work_done',
				'jo.labor_date_started',
				'jo.labor_time_started',
				'jo.labor_date_completed',
				'jo.labor_time_completed',
				'jo.trial_result',
				'jo.trial_at',
				'jo.accepted_at',
				'jo.accepted_by',
				'jo.noted_at',
				'jo.noted_by',
				'jo.status',
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
				'ec.type as equipment_category',
				'et.equipment_type',
				'reported.fname as reported_fname',
				'reported.lname as reported_lname',
				'loc.location',
				'inspected.fname as inspected_fname',
				'inspected.lname as inspected_lname',
				'conducted.fname as conducted_fname',
				'conducted.lname as conducted_lname',
				'trial_personnel.fname as trial_personnel_fname',
				'trial_personnel.lname as trial_personnel_lname',
				'accepted.fname as accepted_fname',
				'accepted.lname as accepted_lname',
				'noted.fname as noted_fname',
				'noted.lname as noted_lname',
				'pt.pms_milestone',
				'pmv.pms_main'
			)
		->get();
		return $x;
	}

	public static function getSecondaryFull($id)
	{
        $y = DB::table('job_order_item as joi')
            ->select(
                'joi.id',
                'joi.item_id',
                'joi.qty',
                'joi.unit',
                'joi.purchased_price',
                'wi.item_id as information_id',
                'wi.brand',
                'wi.serial_id',
                'wi.item_name',
            )
            ->where('joi.jo_main', '=', $id)
            ->leftJoin('warehouse_inventory as wi', 'wi.id', '=', 'joi.item_id')
            ->get();
        return $y;
    }

    public static function acceptJobOrder($x)
    {
    	$z 	= DB::table('job_order')
    		->where('id', '=', $x['id'])
    		->update(
    			array(
    				'accepted_by'                => auth::user()->id,
                    'accepted_at'                => date("Y-m-d H:i:s"),
                    'status'                    => 'Accepted',
    			)
    		);

    	$gJ 	= DB::table('job_order')
    			->where('id', '=', $x['id'])
    			->get();

    	$gE 	= DB::table('equipment')
    			->where('id', '=', $gJ[0]->equipment_id)
    			->get();

    	$notif = DB::table('notification')
                ->where('module', '=', 'Ongoing JO')
                ->where('module_id', '=', $x['id'])
                ->where('status', '=', 'Pending')
                ->update(
                    array(
                        'done_by'           => auth::user()->id,
                        'done_at'           => date("Y-m-d H:i:s"),
                        'status'            => 'Completed'
                    )
                );
        
        $jobNf = DB::table('notification')
                ->insert(
                    array(
                        'module'            => 'Ongoing JO',
                        'tag'               => 'for '.$gE[0]->brand.'-'.$gE[0]->equipment_id,
                        'module_id'         => $x['id'],
                        'url'               => 'viewJobOrder=kgTcLtGsKT'.$x['id'].'HmYYKpuQykDbTVqaWGFfPnMKncnxTmbutcMexHe',
                        'requested_action'  => 'For Review',
                        'requested_by'      => auth::user()->id,
                        'requested_at'      => date("Y-m-d H:i:s")
                    )
            );

        return $z;
    }

    public static function noteJobOrder($x)
    {
    	$z 	= DB::table('job_order')
    		->where('id', '=', $x['id'])
    		->update(
    			array(
    				'noted_by'                => auth::user()->id,
                    'noted_at'                => date("Y-m-d H:i:s"),
                    'status'                    => 'Completed',
    			)
    		);

    	$gJ 	= DB::table('job_order')
    			->where('id', '=', $x['id'])
    			->get();

    	$gE 	= DB::table('equipment')
    			->where('id', '=', $gJ[0]->equipment_id)
    			->get();

    	$notif = DB::table('notification')
                ->where('module', '=', 'Ongoing JO')
                ->where('module_id', '=', $x['id'])
                ->where('status', '=', 'Pending')
                ->update(
                    array(
                        'done_by'           => auth::user()->id,
                        'done_at'           => date("Y-m-d H:i:s"),
                        'status'            => 'Completed'
                    )
                );

        $uE 	= DB::table('equipment')
    			->where('id', '=', $gJ[0]->equipment_id)
    			->update(
    				array(
    					'current_location'		=> '',
    					'pms_status' 			=> 'Not Yet',
    					'last_pms'				=> date("Y-m-d H:i:s"),
    					'status'				=> 'Active'
    				)
    			);

    	$eOut 	= DB::table('notification')
                ->insert(
                    array(
                        'module'            => 'Equipment Maintenance Successful',
                        'tag'               => 'for '.$gE[0]->brand.'-'.$gE[0]->equipment_id,
                        'module_id'         => $x['id'],
                        'url'               => 'equipmentRegister',
                        'requested_action'  => 'Maintenance Completed',
                        'requested_by'      => auth::user()->id,
                        'requested_at'      => date("Y-m-d H:i:s"),
                        'done_at'      		=> date("Y-m-d H:i:s"),
                        'done_by'      		=> auth::user()->id,
                        'status'			=> 'Completed'
                    )
            );
    	return $z;
    }

	// public static function jobOrderItem($id)
	// {
	// 	$x = DB::table('job_order_item as joi')
	// 		->where('joi.jo_main', '=', $id)
	// 		->leftJoin('warehouse_inventory as wi', 'wi.id', '=', 'joi.pms_type_item_id')
	// 		->get();
	// 	return $x;
	// }

	// public static function getFleetJOdisplay()
	// {
	// 	$x = DB::table('job_order')
	// 		->where('status', '=', 'On going')
	// 		->get();
	// 	return $x;
	// }


	// public static function getJobOrder($id)
	// {
	// 	$x = DB::table('job_order as jo')
	// 	->select(
	// 			'jo.id',
	// 			'jo.job_order_date',
	// 			'jo.job_order_no',
	// 			'jo.labor_type',
	// 			'jo.problems_encountered',
	// 			'jo.details_of_work_done',
	// 			'jo.labor_date_started',
	// 			'jo.labor_date_completed',
	// 			'jo.labor_time_started',
	// 			'jo.labor_time_completed',
	// 			'jo.trial_date',
	// 			'jo.trial_result',
	// 			'jo.accepted_date',
	// 			'jo.noted_date',
	// 			'jo.status',

	// 			'f.model',
	// 			'f.plate_number',
	// 			'f.chassis_number',

	// 			'loc.location',

	// 			'flet.type as fleet_type',

	// 			'pmst.pms_type',

	// 			'do.fname as do_fname',
	// 			'do.mname as do_mname',
	// 			'do.lname as do_lname',

	// 			'ib.fname as ib_fname',
	// 			'ib.mname as ib_mname',
	// 			'ib.lname as ib_lname',

	// 			'cb.fname as cb_fname',
	// 			'cb.mname as cb_mname',
	// 			'cb.lname as cb_lname',

	// 			'tp.fname as tp_fname',
	// 			'tp.mname as tp_mname',
	// 			'tp.lname as tp_lname',

	// 			'ab.fname as ab_fname',
	// 			'ab.mname as ab_mname',
	// 			'ab.lname as ab_lname',

	// 			'nb.fname as nb_fname',
	// 			'nb.mname as nb_mname',
	// 			'nb.lname as nb_lname'
	// 		)
	// 		->where('jo.id', '=', $id)
	// 		->leftJoin('fleet as f', 'f.id', '=', 'jo.fleet_equipment')
	// 		->leftJoin('location as loc', 'loc.id', '=', 'jo.location')
	// 		->leftJoin('fleet_type as flet', 'flet.id', '=', 'f.fleet_type')
	// 		->leftJoin('pms_type as pmst', 'pmst.id', '=', 'f.pms_type')
	// 		->leftJoin('users as do', 'do.id', '=', 'jo.driver_operator')
	// 		->leftJoin('users as ib', 'ib.id', '=', 'jo.inspected_by')
	// 		->leftJoin('users as cb', 'cb.id', '=', 'jo.conducted_by')
	// 		->leftJoin('users as tp', 'tp.id', '=', 'jo.trial_personnel')
	// 		->leftJoin('users as ab', 'ab.id', '=', 'jo.accepted_by')
	// 		->leftJoin('users as nb', 'nb.id', '=', 'jo.noted_by')

	// 		->get();
	// 	return $x;
	// }

	// public static function getSecondary($id)
	// {
 //        $y = DB::table('job_order_item as joi')
 //            ->select(
 //                'joi.id',
 //                'joi.pms_type_item_id',
 //                'joi.qty',
 //                'joi.unit',
 //                'joi.reference_id',
 //                'joi.amount',
 //                'wi.item_id',
 //                'wi.serial_id',
 //                'wi.item_name',
 //            )
 //            ->where('joi.jo_main', '=', $id)
 //            ->leftJoin('warehouse_inventory as wi', 'wi.id', '=', 'joi.pms_type_item_id')
 //            ->get();
 //        return $y;
 //    }

 //    public static function updateJobOrder($x)
 //    {

 //    	$y = DB::table('job_order')
 //    		->where('id', '=', $x['id'])
 //            ->update(
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
 //                    'noted_date'            => $x['noted_date'],
 //                    'noted_by'              => $x['noted_by'],
 //                )
 //            );
        
 //        if( isset($x['pms_id']) && !empty($x['pms_id']) ){
	//         foreach($x['pms_id'] as $key => $value) {
	//             DB::table('job_order_item')
	//                 ->insert(
	//                     array(
	//                     	'jo_main'				=> $x['id'],
	//                         'pms_type_item_id'      => $x['pms_id'][$key],
	//                         'qty'                   => $x['qty'][$key],
	//                         'unit'                  => $x['unit'][$key],
	//                         'reference_id'          => $x['reference_id'][$key],
	//                         'amount'                => $x['amount'][$key],
	//                     )
	//                 );
	//         }
	//     }

 //    	if($x['noted_by'] == ''){
 //    		$h = DB::table('job_order')
	//     		->where('id', '=', $x['id'])
	//     		->update(
	//     			array(
	//     				'status' 				=> 'On going'
	//     			)
	//     		);
 //    	}
 //    	else{
	//     	$h = DB::table('job_order')
	//     		->where('id', '=', $x['id'])
	//     		->update(
	//     			array(
	//     				'status' 				=> 'Completed'
	//     			)
	//     		);
	    		
	//     	$h = DB::table('fleet')
	//     		->where('id', '=', $x['fleet_equipment'])
	//     		->update(
	//     			array(
	//     				'status' 				=> 'Active',
	//     				'odometer_current'		=> '0',
	//     				'km_current'			=> '0',
	//     				'hr_current'			=> '0',
	//     				'pms_status'			=> 'Not Yet'
	//     			)
	//     		);
	//     	$k = DB::table('fleet_maintenance_cost')
	//     		->insert(
	//     			array(
	//     				'fleet_equipment' 		=> $x['fleet_equipment'],
	//     				'job_order_id'			=> $x['id'],
	//     				'maintenance_cost'		=> collect($x['amount'])->sum(),
	//     				'date'					=> $x['labor_date_completed']
	//     			)
	//     		);
 //    	}
 //        return $y;
 //    }

    public static function deleteJobOrderItem($x)
    {
    	$y = DB::table('job_order_item')
			->where('id', '=', $x['id'])
			->delete();
		return $y;
    }
}