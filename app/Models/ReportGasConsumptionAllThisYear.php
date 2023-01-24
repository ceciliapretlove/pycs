<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class ReportGasConsumptionAllThisYear extends Model
{
	// public static function getList()
	// {
	// 	$year 	= date('Y');
	// 	$f 		= DB::table('dispatch_main as dm')
	// 			->select(
	// 				'f.equipment_id',
	// 				'f.model',
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)

	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->leftJoin('fleet as f', 'f.id', '=', 'dm.fleet_unit')
	// 			->groupBy('f.model', 'f.equipment_id')
	// 			->orderBy('consumption', 'desc')
	// 			->get();
	// 	return $f;
	// }

	public static function getGasConsumptionAllThisYearJan()
	{
		$year 	= date('Y');
		$month 	= '01';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionAllThisYearFeb()
	{
		$year 	= date('Y');
		$month 	= '02';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionAllThisYearMar()
	{
		$year 	= date('Y');
		$month 	= '03';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}


	public static function getGasConsumptionAllThisYearApr()
	{
		$year 	= date('Y');
		$month 	= '04';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionAllThisYearMay()
	{
		$year 	= date('Y');
		$month 	= '05';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionAllThisYearJun()
	{
		$year 	= date('Y');
		$month 	= '06';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionAllThisYearJul()
	{
		$year 	= date('Y');
		$month 	= '07';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionAllThisYearAug()
	{
		$year 	= date('Y');
		$month 	= '08';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionAllThisYearSep()
	{
		$year 	= date('Y');
		$month 	= '09';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionAllThisYearOct()
	{
		$year 	= date('Y');
		$month 	= '10';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionAllThisYearNov()
	{
		$year 	= date('Y');
		$month 	= '11';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}

	public static function getGasConsumptionAllThisYearDec()
	{
		$year 	= date('Y');
		$month 	= '12';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.gas) as gas')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->gas == null || $vam[0]->gas == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->gas;
		}
		return $g;
	}
}