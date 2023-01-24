<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class ReportUtilization extends Model
{
	public static function getUtilizationBaseOnFilterJan($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '01';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationBaseOnFilterFeb($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '02';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationBaseOnFilterMar($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '03';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationBaseOnFilterApr($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '04';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationBaseOnFilterMay($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '05';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationBaseOnFilterJun($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '06';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationBaseOnFilterJul($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '07';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationBaseOnFilterAug($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '08';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationBaseOnFilterSep($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '09';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationBaseOnFilterOct($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '10';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationBaseOnFilterNov($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '11';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationBaseOnFilterDec($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '12';
		$year 		= date("Y", $rawD);

		$totalD = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$vam 	= DB::table('operations_dispatch_tripping_main as odtm')
				->where('odtm.equipment_type', '=', $x['equipment_type'])
				->where('odtm.equipment_id', '=', $x['equipment'])
				->whereMonth('odtm.odt_date', '=', $month)
				->whereYear('odtm.odt_date', '=', $year)
				->leftJoin('operations_dispatch_tripping_secondary as odts', 'odts.odtm_main', '=', 'odtm.id')
				->count();
		$val 	= round(($vam/$totalD)*100);
		return $val;
	}

	public static function getUtilizationOperationsBaseOnFilter($x)
	{
		$rawD 		= strtotime($x['filter']);
		$year 		= date("Y", $rawD);

		$z = DB::table('operations_dispatch_tripping_main as odtm')
			->where('odtm.equipment_type', '=', $x['equipment_type'])
			->where('odtm.equipment_id', '=', $x['equipment'])
			->whereYear('odtm.odt_date', '=', $year)
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
            ->orderBy('odtm.odt_date', 'desc')
            ->get();
        return $z;
	}
}