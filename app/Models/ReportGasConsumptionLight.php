<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class ReportGasConsumptionLight extends Model
{
	public static function getList()
	{
		$year 	= date('Y');
		$f 		= DB::table('dispatch_main as dm')
				->select(
					'f.equipment_id',
					'f.model',
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->where('dm.fleet_type', '2')
				->whereYear('dm.date_coverage_start', '=', $year)
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->leftJoin('fleet as f', 'f.id', '=', 'dm.fleet_unit')
				->groupBy('f.model', 'f.equipment_id')
				->orderBy('consumption', 'desc')
				->get();
		return $f;
	}

	public static function getGasConsumptionLightJan()
	{
		$year 	= date('Y');
		$month 	= '01';
		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$janH = 0;
		}else{
			$janH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $janH;
	}

	public static function getGasConsumptionLightFeb()
	{
		$year 	= date('Y');
		$month 	= '02';

		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$febH = 0;
		}else{
			$febH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $febH;
	}

	public static function getGasConsumptionLightMar()
	{
		$year 	= date('Y');
		$month 	= '03';

		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$marH = 0;
		}else{
			$marH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $marH;
	}


	public static function getGasConsumptionLightApr()
	{
		$year 	= date('Y');
		$month 	= '04';

		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$aprH = 0;
		}else{
			$aprH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $aprH;
	}

	public static function getGasConsumptionLightMay()
	{
		$year 	= date('Y');
		$month 	= '05';

		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$mayH = 0;
		}else{
			$mayH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $mayH;
	}

	public static function getGasConsumptionLightJun()
	{
		$year 	= date('Y');
		$month 	= '06';

		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$junH = 0;
		}else{
			$junH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $junH;
	}

	public static function getGasConsumptionLightJul()
	{
		$year 	= date('Y');
		$month 	= '07';

		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$julH = 0;
		}else{
			$julH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $julH;
	}

	public static function getGasConsumptionLightAug()
	{
		$year 	= date('Y');
		$month 	= '08';

		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$augH = 0;
		}else{
			$augH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $augH;
	}

	public static function getGasConsumptionLightSep()
	{
		$year 	= date('Y');
		$month 	= '09';

		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$sepH = 0;
		}else{
			$sepH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $sepH;
	}

	public static function getGasConsumptionLightOct()
	{
		$year 	= date('Y');
		$month 	= '10';

		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$octH = 0;
		}else{
			$octH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $octH;
	}

	public static function getGasConsumptionLightNov()
	{
		$year 	= date('Y');
		$month 	= '11';

		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$novH = 0;
		}else{
			$novH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $novH;
	}

	public static function getGasConsumptionLightDec()
	{
		$year 	= date('Y');
		$month 	= '12';

		$vam 	= DB::table('dispatch_main as dm')
				->select(
					DB::raw('SUM(ds.total_hours) as total_hours'),
					DB::raw('SUM(ds.total_kms) as total_kms'),
					DB::raw('SUM(ds.consumption) as consumption')
				)
				->whereMonth('dm.date_coverage_start', '=', $month)
				->whereYear('dm.date_coverage_start', '=', $year)
				->where('dm.fleet_type', '2')
				->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
				->get();
		if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
			$decH = 0;
		}else{
			$decH 	= ($vam[0]->total_kms/$vam[0]->consumption);
		}
		return $decH;
	}
}