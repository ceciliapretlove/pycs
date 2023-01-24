<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class ReportMeanTimeMajorHours extends Model
{
 	public static function rmtMajorJan($x){

 		$rawD 		= strtotime($x['filter']);
		$month 		= '01';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

 	public static function rmtMajorFeb($x){
 		$rawD 		= strtotime($x['filter']);
		$month 		= '02';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

 	public static function rmtMajorMar($x){
 		$rawD 		= strtotime($x['filter']);
		$month 		= '03';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

 	public static function rmtMajorApr($x){
 		$rawD 		= strtotime($x['filter']);
		$month 		= '04';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

 	public static function rmtMajorMay($x){
 		$rawD 		= strtotime($x['filter']);
		$month 		= '05';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

 	public static function rmtMajorJun($x){
 		$rawD 		= strtotime($x['filter']);
		$month 		= '06';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

 	public static function rmtMajorJul($x){
 		$rawD 		= strtotime($x['filter']);
		$month 		= '07';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

 	public static function rmtMajorAug($x){
 		$rawD 		= strtotime($x['filter']);
		$month 		= '08';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

 	public static function rmtMajorSep($x){
 		$rawD 		= strtotime($x['filter']);
		$month 		= '09';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

 	public static function rmtMajorOct($x){
 		$rawD 		= strtotime($x['filter']);
		$month 		= '10';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

 	public static function rmtMajorNov($x){
 		$rawD 		= strtotime($x['filter']);
		$month 		= '11';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

 	public static function rmtMajorDec($x){
 		$rawD 		= strtotime($x['filter']);
		$month 		= '12';
		$year 		= date("Y", $rawD);

		$joRaw 		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->count();
		if($joRaw == 0){
			$jo = 1;
		}else{
			$jo = $joRaw;
		}

		$cjo		= DB::table('job_order')
					->where('equipment_type', '=', $x['equipment_type'])
					->where('equipment_id', '=', $x['equipment'])
					->where('status', '=', 'Completed')
					->whereYear('labor_date_started', '=', $year)
					->whereMonth('labor_date_started', '=', $month)
					->where('labor_type', '!=', 'Preventive Maintenance')
					->get();

		$arr = [];
		foreach ($cjo as $key => $value) {
			$lds = $value->labor_date_started;
			$lts = $value->labor_time_started;
			$ldc = $value->labor_date_completed;
			$ltc = $value->labor_time_completed;
			$date1 = date('Y-m-d H:i:s', strtotime("$lds $lts"));
			$date2 = date('Y-m-d H:i:s', strtotime("$ldc $ltc"));
			$time1 = strtotime($date1);
			$time2 = strtotime($date2);
			$hour = abs(($time1 - $time2)/(60*60));
			array_push($arr, $hour);
		}
		$y = (array_sum($arr)/$jo);
		return $y;
 	}

}