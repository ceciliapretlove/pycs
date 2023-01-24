<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class LiquidationGraph extends Model
{
	//LIQUIDATED
	public static function getSumOfLiquidatedYearJan()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '01';
		$year 		= date("Y", $rawD);

		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
		// $val 	= $a+$b ;
				
		return $merged;
	}

	public static function getSumOfLiquidatedYearFeb()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '02';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
		// $val 	= $a+$b ;
				
		return $merged;
	}

	public static function getSumOfLiquidatedYearMar()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '03';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
		// $val 	= $a+$b ;
				
		return $merged;
	}

	public static function getSumOfLiquidatedYearApr()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '04';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
		// $val 	= $a+$b ;
				
		return $merged;
	}

	public static function getSumOfLiquidatedYearMay()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '05';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
		// $val 	= $a+$b ;
				
		return $merged;
	}

	public static function getSumOfLiquidatedYearJun()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '06';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
		// $val 	= $a+$b ;
				
		return $merged;
	}

	public static function getSumOfLiquidatedYearJul()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '07';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();
				$merged = $a->merge($b);
		// $val 	= round(round($a+$b));
		return $merged;
	}

	public static function getSumOfLiquidatedYearAug()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '08';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

		$merge = $a->merge($b);
		// $val 	= $a+$b ;
				
		return $merge;


	}

	public static function getSumOfLiquidatedYearSep()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '09';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
		// $val 	= $a+$b ;
				
		return $merged;
	}

	public static function getSumOfLiquidatedYearOct()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '10';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
		// $val 	= $a+$b ;
				
		return $merged;
	}

	public static function getSumOfLiquidatedYearNov()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '11';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
		// $val 	= $a+$b ;
				
		return $merged;
	}

	public static function getSumOfLiquidatedYearDec()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '12';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 1)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 1)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
		// $val 	= $a+$b ;
				
		return $merged;
	}


//UNLIQUIDATED
		public static function getSumOfUnliquidatedYearJan()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '01';
		$year 		= date("Y", $rawD);

		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
				
		return $merged;
	}

	public static function getSumOfUnliquidatedYearFeb()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '02';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
				
		return $merged;
	}

	public static function getSumOfUnliquidatedYearMar()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '03';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
				
		return $merged;
	}

	public static function getSumOfUnliquidatedYearApr()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '04';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
				
		return $merged;
	}

	public static function getSumOfUnliquidatedYearMay()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '05';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
				
		return $merged;
	}

	public static function getSumOfUnliquidatedYearJun()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '06';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
				
		return $merged;
	}

	public static function getSumOfUnliquidatedYearJul()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '07';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);

		return $merged;
	}

	public static function getSumOfUnliquidatedYearAug()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '08';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
				
		return $merged;
	}

	public static function getSumOfUnliquidatedYearSep()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '09';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
				
		return $merged;
	}

	public static function getSumOfUnliquidatedYearOct()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '10';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
				
		return $merged;
	}

	public static function getSumOfUnliquidatedYearNov()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '11';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
				
		return $merged;
	}

	public static function getSumOfUnliquidatedYearDec()
	{
		$rawD 		= strtotime(date("d.m.Y"));
		$month 		= '12';
		$year 		= date("Y", $rawD);

		
		$a      = DB::table('cash_advance_child as cac')
				->select(DB::RAW('SUM(amount) as amount'))
				->where('cac.status', '=', 0)
				->whereMonth('cac.created_at', '=', $month)
				->whereYear('cac.created_at', '=', $year)
				->get();
		
		$b 	= DB::table('check_voucher_child as cvc')
				->where('cvc.status', '=', 0)
				->whereMonth('cvc.created_at', '=', $month)
				->whereYear('cvc.created_at', '=', $year)
				->select(DB::RAW('SUM(amount) as amount'))
				->get();

				$merged = $a->merge($b);
				
		return $merged;
	}
}