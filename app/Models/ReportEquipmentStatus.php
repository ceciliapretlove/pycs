<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class ReportEquipmentStatus extends Model
{
	public static function getEquipmentsBaseOnFilter($x)
	{
		$e = DB::table('equipment')
			->where('equipment_type', '=', $x['equipment_type'])
			->where('equipment_category', '=', $x['equipment_category'])
			->get();
		return $e;
	}

	public static function getOperationBaseOnFilter($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= date("m", $rawD);
		$year 		= date("Y", $rawD);

		$odts 		= DB::table('operations_dispatch_tripping_summary as odts')
					->select(
						'odts.equipment_id',
						'loc.location',
						DB::raw('DATE_FORMAT(odts.date_used, "%d") as date')
					)
					->leftJoin('location as loc', 'loc.id', '=', 'odts.location_used')
					->where('odts.equipment_type', '=', $x['equipment_type'])
					->where('odts.equipment_category', '=', $x['equipment_category'])
					->whereMonth('odts.date_used', $month)
					->whereYear('odts.date_used', $year)
					->get();
		return $odts;
	}

	public static function getRepairsBaseOnFilter($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= date("m", $rawD);
		$year 		= date("Y", $rawD);

		$ut 		= DB::table('job_order as jo')
					->select(
						'jo.equipment_id',
						'loc.location',
						DB::raw('DATE_FORMAT(jo.reported_date, "%d") as date')
					)
					->leftJoin('location as loc', 'loc.id', '=', 'jo.location')
					->whereMonth('jo.reported_date', $month)
					->whereYear('jo.reported_date', $year)
					->where('jo.status', '=', 'Accepted')
					->where('jo.equipment_type', '=', $x['equipment_type'])
					->where('jo.equipment_category', '=', $x['equipment_category'])
					->get();
		return $ut;
	}

	public static function getBreakdownBaseOnFilter($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= date("m", $rawD);
		$year 		= date("Y", $rawD);

		$ut 		= DB::table('job_order as jo')
					->select(
						'jo.equipment_id',
						'loc.location',
						DB::raw('DATE_FORMAT(jo.reported_date, "%d") as date')
					)
					->leftJoin('location as loc', 'loc.id', '=', 'jo.location')
					->whereMonth('jo.reported_date', $month)
					->whereYear('jo.reported_date', $year)
					->where('jo.status', '=', 'Created')
					->where('jo.equipment_type', '=', $x['equipment_type'])
					->where('jo.equipment_category', '=', $x['equipment_category'])
					->get();
		return $ut;
	}

	

	// public static function filterUtilization($x)
	// {
	// 	$rawD 		= strtotime($x['filter']);
	// 	$month 		= date("m", $rawD);
	// 	$year 		= date("Y", $rawD);

	// 	// dd($month);

	// 	$ut 		= DB::table('dispatch_secondary as ds')
	// 				->select(
	// 					'dm.fleet_unit as equipment_id',
	// 					'loc.location',
	// 					DB::raw('DATE_FORMAT(ds.date, "%d") as date')
	// 				)
	// 				->whereMonth('ds.date', $month)
	// 				->whereYear('ds.date', $year)
	// 				->where('ds.status', 'Approved')
	// 				->leftJoin('dispatch_main as dm', 'dm.id', '=', 'ds.trip_id')
	// 				->leftJoin('location as loc', 'loc.id', '=', 'ds.location')
	// 				->get();
	// 	return $ut;
	// }

	// public static function filterRepairs($x)
	// {
	// 	$rawD 		= strtotime($x['filter']);
	// 	$month 		= date("m", $rawD);
	// 	$year 		= date("Y", $rawD);

	// 	$ut 		= DB::table('job_order as jo')
	// 				->select(
	// 					'jo.fleet_equipment as equipment_id',
	// 					DB::raw('DATE_FORMAT(jo.labor_date_started, "%d") as date')
	// 				)
	// 				->whereMonth('jo.labor_date_started', $month)
	// 				->whereYear('jo.labor_date_started', $year)
	// 				->where('jo.status', '!=', 'Deleted')
	// 				->get();
	// 	return $ut;
	// }
}