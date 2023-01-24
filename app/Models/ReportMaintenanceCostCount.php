<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class ReportMaintenanceCostCount extends Model
{
	public static function getCostOverall()
	{
		$z = DB::table('job_order as jo')
			->leftJoin('equipment as eq', 'eq.id', '=', 'jo.equipment_id')
			->leftJoin('job_order_item as joi', 'joi.jo_main', '=', 'jo.id')
			->select(
				'eq.equipment_id',
				'eq.model',
				'eq.brand',
				'eq.year_model',
				DB::raw('SUM(joi.purchased_price) as purchased_price')
			)
			->groupBy('eq.equipment_id', 'eq.model', 'eq.year_model', 'eq.brand')
			->orderBy('purchased_price', 'desc')
			->limit(5)
			->get();
		return $z;
	}

	public static function getCostYear()
	{
		$z = DB::table('job_order as jo')
			->whereYear('jo.reported_date', date('Y'))
			->leftJoin('equipment as eq', 'eq.id', '=', 'jo.equipment_id')
			->leftJoin('job_order_item as joi', 'joi.jo_main', '=', 'jo.id')
			->select(
				'eq.equipment_id',
				'eq.model',
				'eq.brand',
				'eq.year_model',
				DB::raw('SUM(joi.purchased_price) as purchased_price')
			)
			->groupBy('eq.equipment_id', 'eq.model', 'eq.year_model', 'eq.brand')
			->orderBy('purchased_price', 'desc')
			->limit(5)
			->get();
		return $z;
	}

	public static function generateFilterCost($x)
	{
		$rawD 		= strtotime($x['filter']);
		$month 		= date("m", $rawD);
		$year 		= date("Y", $rawD);
		
		$z = DB::table('job_order as jo')
			->whereMonth('jo.reported_date', $month)
			->whereYear('jo.reported_date', $year)
			->where('jo.equipment_category', '=', $x['equipment_category'])
			->where('jo.equipment_type', '=', $x['equipment_type'])
			->leftJoin('equipment as eq', 'eq.id', '=', 'jo.equipment_id')
			->leftJoin('job_order_item as joi', 'joi.jo_main', '=', 'jo.id')
			->select(
				'eq.equipment_id',
				'eq.model',
				'eq.brand',
				'eq.year_model',
				DB::raw('SUM(joi.purchased_price) as purchased_price')
			)
			->groupBy('eq.equipment_id', 'eq.model', 'eq.year_model', 'eq.brand')
			->orderBy('purchased_price', 'desc')
			->limit(5)
			->get();
		return $z;
	}

	

	// public static function getMatsOilsOverall()
	// {
	// 	$y = DB::table('job_order_item as joi')
	// 		->select(
	// 			DB::raw('SUM(joi.qty) as qty'),
	// 			'wi.item_name',
	// 			'wi.item_id'
	// 		)
	// 		->whereIn('wi.unit', ['bottle', 'can', 'litre'])
	// 		->leftJoin('warehouse_inventory as wi', 'wi.id', '=', 'joi.pms_type_item_id')
	// 		->groupBy('joi.pms_type_item_id', 'wi.item_id', 'wi.brand')
	// 		->orderBy('qty', 'desc')
	// 		->limit(5)
	// 		->get();
	// 	return $y;
	// }

	// public static function getMatsSpareOverall()
	// {
	// 	$y = DB::table('job_order_item as joi')
	// 		->select(
	// 			DB::raw('SUM(joi.qty) as qty'),
	// 			'wi.item_name',
	// 			'wi.item_id'
	// 		)
	// 		->whereNotIn('wi.unit', ['bottle', 'can', 'litre'])
	// 		->leftJoin('warehouse_inventory as wi', 'wi.id', '=', 'joi.pms_type_item_id')
	// 		->groupBy('joi.pms_type_item_id', 'wi.item_id', 'wi.brand')
	// 		->orderBy('qty', 'desc')
	// 		->limit(5)
	// 		->get();
	// 	return $y;
	// }
}