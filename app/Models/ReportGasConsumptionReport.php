<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class ReportGasConsumptionReport extends Model
{
	public static function gasTopFiveAll()
	{
		$m = DB::table('operations_dispatch_tripping_summary as odts')
			->select(
				DB::raw('sum(odts.gas) as sum'),
				'eq.brand',
				'eq.equipment_id',
				'eq.year_model',
				'eq.model'
			)
			->leftJoin('equipment as eq', 'eq.id', '=', 'odts.equipment_id')
			->groupBy('odts.equipment_id', 'eq.brand', 'eq.year_model', 'eq.model')
			->limit(5)
			->get();
		return $m;
	}

	public static function gasTopFiveYear()
	{
		$year = date('Y');
		$m = DB::table('operations_dispatch_tripping_summary as odts')
			->whereYear('odts.date_used', '=', $year)
			->select(
				DB::raw('sum(odts.gas) as sum'),
				'eq.brand',
				'eq.equipment_id',
				'eq.year_model',
				'eq.model'
			)
			->leftJoin('equipment as eq', 'eq.id', '=', 'odts.equipment_id')
			->groupBy('odts.equipment_id', 'eq.brand', 'eq.year_model', 'eq.model')
			->limit(5)
			->get();
		return $m;
	}

	public static function getGasConsumptionBaseOnFilterJan($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '01';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

	public static function getGasConsumptionBaseOnFilterFeb($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '02';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

	public static function getGasConsumptionBaseOnFilterMar($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '03';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

	public static function getGasConsumptionBaseOnFilterApr($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '04';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

	public static function getGasConsumptionBaseOnFilterMay($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '05';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

	public static function getGasConsumptionBaseOnFilterJun($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '06';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

	public static function getGasConsumptionBaseOnFilterJul($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '07';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

	public static function getGasConsumptionBaseOnFilterAug($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '08';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

	public static function getGasConsumptionBaseOnFilterSep($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '09';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

	public static function getGasConsumptionBaseOnFilterOct($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '10';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

	public static function getGasConsumptionBaseOnFilterNov($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '11';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

	public static function getGasConsumptionBaseOnFilterDec($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= '12';
		$year 		= date("Y", $rawD);
		$vam 		= DB::table('operations_dispatch_tripping_summary as odts')
						->whereYear('odts.date_used', '=', $year)
						->whereMonth('odts.date_used', '=', $month)
						->where('odts.equipment_id', '=', $x['equipment'])
						->where('odts.equipment_type', '=', $x['equipment_type'])
						->select(
							DB::raw('sum(odts.gas) as sum')
						)
					->get();
		if($vam[0]->sum == null || $vam[0]->sum == ''){
			$g = 0;
		}else{
			$g 	= $vam[0]->sum;
		}					
		return $g;
	}

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
	// 			->where('dm.fleet_type', '1')
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->leftJoin('fleet as f', 'f.id', '=', 'dm.fleet_unit')
	// 			->groupBy('f.model', 'f.equipment_id')
	// 			->orderBy('consumption', 'desc')
	// 			->get();
	// 	return $f;
	// }

	// public static function getGasConsumptionHeavyJan()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '01';
	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$janH = 0;
	// 	}else{
	// 		$janH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $janH;
	// }

	// public static function getGasConsumptionHeavyFeb()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '02';

	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$febH = 0;
	// 	}else{
	// 		$febH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $febH;
	// }

	// public static function getGasConsumptionHeavyMar()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '03';

	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$marH = 0;
	// 	}else{
	// 		$marH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $marH;
	// }


	// public static function getGasConsumptionHeavyApr()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '04';

	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$aprH = 0;
	// 	}else{
	// 		$aprH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $aprH;
	// }

	// public static function getGasConsumptionHeavyMay()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '05';

	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$mayH = 0;
	// 	}else{
	// 		$mayH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $mayH;
	// }

	// public static function getGasConsumptionHeavyJun()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '06';

	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$junH = 0;
	// 	}else{
	// 		$junH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $junH;
	// }

	// public static function getGasConsumptionHeavyJul()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '07';

	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$julH = 0;
	// 	}else{
	// 		$julH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $julH;
	// }

	// public static function getGasConsumptionHeavyAug()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '08';

	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$augH = 0;
	// 	}else{
	// 		$augH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $augH;
	// }

	// public static function getGasConsumptionHeavySep()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '09';

	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$sepH = 0;
	// 	}else{
	// 		$sepH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $sepH;
	// }

	// public static function getGasConsumptionHeavyOct()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '10';

	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$octH = 0;
	// 	}else{
	// 		$octH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $octH;
	// }

	// public static function getGasConsumptionHeavyNov()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '11';

	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$novH = 0;
	// 	}else{
	// 		$novH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $novH;
	// }

	// public static function getGasConsumptionHeavyDec()
	// {
	// 	$year 	= date('Y');
	// 	$month 	= '12';

	// 	$vam 	= DB::table('dispatch_main as dm')
	// 			->select(
	// 				DB::raw('SUM(ds.total_hours) as total_hours'),
	// 				DB::raw('SUM(ds.total_kms) as total_kms'),
	// 				DB::raw('SUM(ds.consumption) as consumption')
	// 			)
	// 			->whereMonth('dm.date_coverage_start', '=', $month)
	// 			->whereYear('dm.date_coverage_start', '=', $year)
	// 			->where('dm.fleet_type', '1')
	// 			->leftJoin('dispatch_secondary as ds', 'ds.trip_id', '=', 'dm.id')
	// 			->get();
	// 	if($vam[0]->total_kms == null || $vam[0]->total_kms == ''){
	// 		$decH = 0;
	// 	}else{
	// 		$decH 	= ($vam[0]->total_kms/$vam[0]->consumption);
	// 	}
	// 	return $decH;
	// }
}