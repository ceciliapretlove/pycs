<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class ReportKilometerGetAllKilometerThisYear extends Model
{

	public static function getKilometerAllThisYearJan()
	{
		$year 	= date('Y');
		$month 	= '01';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}

	public static function getKilometerAllThisYearFeb()
	{
		$year 	= date('Y');
		$month 	= '02';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}

	public static function getKilometerAllThisYearMar()
	{
		$year 	= date('Y');
		$month 	= '03';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}


	public static function getKilometerAllThisYearApr()
	{
		$year 	= date('Y');
		$month 	= '04';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}

	public static function getKilometerAllThisYearMay()
	{
		$year 	= date('Y');
		$month 	= '05';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}

	public static function getKilometerAllThisYearJun()
	{
		$year 	= date('Y');
		$month 	= '06';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}

	public static function getKilometerAllThisYearJul()
	{
		$year 	= date('Y');
		$month 	= '07';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}

	public static function getKilometerAllThisYearAug()
	{
		$year 	= date('Y');
		$month 	= '08';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}

	public static function getKilometerAllThisYearSep()
	{
		$year 	= date('Y');
		$month 	= '09';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}

	public static function getKilometerAllThisYearOct()
	{
		$year 	= date('Y');
		$month 	= '10';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}

	public static function getKilometerAllThisYearNov()
	{
		$year 	= date('Y');
		$month 	= '11';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}

	public static function getKilometerAllThisYearDec()
	{
		$year 	= date('Y');
		$month 	= '12';
		$vam 	= DB::table('operations_dispatch_tripping_summary as odts')
				->select(
					DB::raw('SUM(odts.km) as km')
				)
				->whereMonth('odts.date_used', '=', $month)
				->whereYear('odts.date_used', '=', $year)
				->get();
		if($vam[0]->km == null || $vam[0]->km == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->km;
		}
		return $g;
	}
}