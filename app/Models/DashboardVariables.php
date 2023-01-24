<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class DashboardVariables extends Model
{

	public static function countActiveEquipment()
	{
		$a = DB::table('equipment')
			->where('status', '=', 'Active')
			->count();
		return $a;
	}

	public static function countRepairingEquipment()
	{
		$r = DB::table('equipment')
			->where('status', '=', 'On Maintenance/Repair')
			->count();
		return $r;
	}

	public static function countScrappedEquipment()
	{
		$s = DB::table('equipment')
			->where('status', '=', 'Scrapped')
			->count();
		return $s;
	}

	public static function topThreeMostUsedEquipmentKm()
	{
		$m = DB::table('operations_dispatch_tripping_summary as odts')
			->select(
				DB::raw('sum(odts.km) as sum'),
				'eq.brand',
				'eq.year_model'
			)
			->leftJoin('equipment as eq', 'eq.id', '=', 'odts.equipment_id')
			->groupBy('odts.equipment_id', 'eq.brand', 'eq.year_model')
			->limit(3)
			->get();
		return $m;
	}

	public static function topThreeMostUsedEquipmentHr()
	{
		$m = DB::table('operations_dispatch_tripping_summary as odts')
			->select(
				DB::raw('sum(odts.operational) as sum'),
				'eq.brand',
				'eq.year_model'
			)
			->leftJoin('equipment as eq', 'eq.id', '=', 'odts.equipment_id')
			->groupBy('odts.equipment_id', 'eq.brand', 'eq.year_model')
			->get();
		return $m;
	}

	public static function topThreeMostBreakdownEquipmentHr()
	{
		$m = DB::table('operations_dispatch_tripping_summary as odts')
			->select(
				DB::raw('sum(odts.breakdown) as sum'),
				'eq.brand',
				'eq.year_model'
			)
			->leftJoin('equipment as eq', 'eq.id', '=', 'odts.equipment_id')
			->groupBy('odts.equipment_id', 'eq.brand', 'eq.year_model')
			->get();
		return $m;
	}

	public static function topLimitedEquipmentLogs()
	{
		$y = DB::table('notification as notif')
            ->where('notif.status', '=', 'Completed')
            ->leftJoin('users as u', 'u.id', '=', 'notif.requested_by')
            ->leftJoin('users as d', 'd.id', '=', 'notif.done_by')
            ->select(
                'notif.id',
                'notif.module',
                'notif.module_id',
                'notif.url',
                'notif.requested_action',
                'notif.requested_at',
                'notif.tag',
                'notif.status',
                'notif.done_at',
                'u.fname',
                'u.lname',
                'd.fname as done_fname',
                'd.lname as done_lname'
            )
            ->orderBy('id', 'desc')
            ->limit('9')
            ->get();
        return $y;
	}

	public static function topMaterialUsed()
	{
		 $y = DB::table('job_order_item as joi')
            ->select(
                'joi.unit',
                'wi.brand',
                'wi.serial_id',
                'wi.item_name',
                DB::raw('sum(joi.qty) as sum')
            )
            ->leftJoin('warehouse_inventory as wi', 'wi.id', '=', 'joi.item_id')
            ->groupBy('joi.unit', 'wi.brand', 'wi.serial_id', 'wi.item_name')
            ->orderBy('sum', 'desc')
            ->get();
        return $y;
	}

	public static function topThreeMostExpensiveRepairEquipment()
	{
		$y = DB::table('job_order_item as joi')
            ->select(
            	'jo.diagnostics_id',
                DB::raw('sum(joi.purchased_price) as sum')
            )
            ->leftJoin('job_order as jo', 'jo.id', '=', 'joi.jo_main')
            ->orderBy('sum', 'desc')
            ->groupBy('jo.diagnostics_id')
            ->limit(3)
            ->get();
        return $y;
	}
}