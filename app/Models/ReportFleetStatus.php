<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class ReportFleetStatus extends Model
{

	public static function filterEquipmentOverviewList($x)
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
	
	public static function readSelectedEquipmentMainForViewing($id)
    {
        $z = DB::table('operations_dispatch_tripping_main as odtm')
            ->where('odtm.equipment_id', '=', $id)
            ->select(
                'odtm.id',
                'odtm.equipment_type as equipment_type_id',
                'odtm.equipment_id',
                'odtm.odt_date',
                'odtm.location as location_id',
                'odtm.operator as operator_id',
                'odtm.fuel_consumption',
                'odtm.odometer_start',
                'odtm.odometer_end',
                'odtm.odometer_total',
                'odtm.equipment_concern_issue',
                'odtm.created_at',
                'odtm.checked_at',
                'odtm.checked_by',
                'odtm.reviewed_at',
                'odtm.reviewed_by',
                'odtm.status',
                'et.equipment_type',
                'ec.type as equipment_category',
                'eq.equipment_id as equipment_id_num',
                'eq.brand',
                'eq.model',
                'eq.year_model',
                'eq.chassis_number',
                'eq.plate_number',
                'prep.fname as prep_fname',
                'prep.lname as prep_lname',
                'check.fname as check_fname',
                'check.lname as check_lname',
                'rev.fname as rev_fname',
                'rev.lname as rev_lname',
                'loc.location'
            )
            ->leftJoin('equipment_type as et', 'et.id', '=', 'odtm.equipment_type')
            ->leftJoin('equipment_category as ec', 'ec.id', '=', 'et.equipment_category')
            ->leftJoin('equipment as eq', 'eq.id', '=', 'odtm.equipment_id')
            ->leftJoin('users as prep', 'prep.id', '=', 'odtm.operator')
            ->leftJoin('users as check', 'check.id', '=', 'odtm.checked_by')
            ->leftJoin('users as rev', 'rev.id', '=', 'odtm.reviewed_by')
            ->leftJoin('location as loc', 'loc.id', '=', 'odtm.location')
            ->get();
        return $z;
    }

    public static function readSelectedEquipmentJOForViewing($id)
    {
    	$x = DB::table('job_order as jo')
    		->where('jo.equipment_id', '=', $id)
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

    public static function getGasConsumptionSelectedEquipmentJan($id)
	{
		$year 	= date('Y');
		$month 	= '01';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionSelectedEquipmentFeb($id)
	{
		$year 	= date('Y');
		$month 	= '02';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionSelectedEquipmentMar($id)
	{
		$year 	= date('Y');
		$month 	= '03';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}


	public static function getGasConsumptionSelectedEquipmentApr($id)
	{
		$year 	= date('Y');
		$month 	= '04';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionSelectedEquipmentMay($id)
	{
		$year 	= date('Y');
		$month 	= '05';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionSelectedEquipmentJun($id)
	{
		$year 	= date('Y');
		$month 	= '06';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionSelectedEquipmentJul($id)
	{
		$year 	= date('Y');
		$month 	= '07';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionSelectedEquipmentAug($id)
	{
		$year 	= date('Y');
		$month 	= '08';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionSelectedEquipmentSep($id)
	{
		$year 	= date('Y');
		$month 	= '09';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionSelectedEquipmentOct($id)
	{
		$year 	= date('Y');
		$month 	= '10';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionSelectedEquipmentNov($id)
	{
		$year 	= date('Y');
		$month 	= '11';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionSelectedEquipmentDec($id)
	{
		$year 	= date('Y');
		$month 	= '12';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->where('odts.equipment_id', '=', $id)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}
}