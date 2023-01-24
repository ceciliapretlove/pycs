<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class DispatchTrippping extends Model
{
    public static function getEquipmentBaseOnType($x)
    {
        $y = DB::table('equipment')
            ->where('equipment_type', '=', $x['id'])
            ->get();
        return $y;
    }

    public static function createDispatchTrippingOperationsReport($x)
    {
        $z = DB::table('operations_dispatch_tripping_main')
            ->insert(
                array(
                    'equipment_type'            => $x['equipment_type'],
                    'equipment_id'              => $x['equipment'],
                    'odt_date'                  => $x['odt_date'],
                    'location'                  => $x['location'],
                    'operator'                  => $x['operator'],
                    'fuel_consumption'          => $x['fuel_consumption'],
                    'odometer_start'            => $x['odometer_start'],
                    'odometer_end'              => $x['odometer_end'],
                    'odometer_total'            => ($x['odometer_end']-$x['odometer_start']),
                    'equipment_concern_issue'   => $x['equipment_concern_issue'],
                    'created_by'                => auth::user()->id,
                    'created_at'                => date("Y-m-d H:i:s")
                )
            );

        $odtm_id = DB::getPdo()->lastInsertId();
        if($z == true){
            foreach($x['activity'] as $key => $value) {
                if( isset($x['activity']) && !empty($x['activity']) ){
                    DB::table('operations_dispatch_tripping_secondary')
                        ->insert(
                            array(
                                'odtm_main'             => $odtm_id,
                                'hourly_stamp'          => $x['hourly_stamp'][$key],
                                'activity'              => $x['activity'][$key],
                                'remarks'               => $x['remarks'][$key],
                            )
                        );
                }
            }

            $notif = DB::table('notification')
                ->insert(
                    array(
                        'module'            => 'Operations and Utilization Report',
                        'module_id'         => $odtm_id,
                        'url'               => 'viewDispatchTripping=mcukBsRETf'.$odtm_id.'LkBYTWLkpCRpVSFNDszaBLVWkujqXvKxYEFkQLq',
                        'requested_action'  => 'For Checking',
                        'requested_by'      => $x['operator'],
                        'requested_at'      => date("Y-m-d H:i:s")
                    )
                );
        }
        return $z;
    }

	public static function read()
	{
        $z = DB::table('operations_dispatch_tripping_main as odtm')
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
                'odtm.reviewed_at',
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
            ->get();
        return $z;
	}

    public static function filterDispatchBaseOnFilter($x)
    {
        $z = DB::table('operations_dispatch_tripping_main as odtm')
            ->where('odtm.equipment_type', '=', $x['id'])
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
                'odtm.reviewed_at',
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
            ->get();
        return $z;
    }

    public static function readSelectedMainForViewing($id)
    {
        $z = DB::table('operations_dispatch_tripping_main as odtm')
            ->where('odtm.id', '=', $id)
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
            ->get();
        return $z;
    }

	public static function readSelectedMain($id)
	{
		$z = DB::table('operations_dispatch_tripping_main as odtm')
            ->where('odtm.id', '=', $id)
            ->select('*')
            ->get();
        return $z;
	}

    public static function readSelectedSecondary($id)
    {
        $z = DB::table('operations_dispatch_tripping_secondary as odts')
            ->where('odts.odtm_main', '=', $id)
            ->select('*')
            ->get();
        return $z;
    }

    public static function editDispatchTrippingOperationsReport($x)
    {
        $z = DB::table('operations_dispatch_tripping_main')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'equipment_type'            => $x['equipment_type'],
                    'equipment_id'              => $x['equipment'],
                    'odt_date'                  => $x['odt_date'],
                    'location'                  => $x['location'],
                    'operator'                  => $x['operator'],
                    'fuel_consumption'          => $x['fuel_consumption'],
                    'odometer_start'            => $x['odometer_start'],
                    'odometer_end'              => $x['odometer_end'],
                    'odometer_total'            => ($x['odometer_end']-$x['odometer_start']),
                    'equipment_concern_issue'   => $x['equipment_concern_issue'],
                    'updated_by'                => auth::user()->id,
                    'updated_at'                => date("Y-m-d H:i:s")
                )
            );

            foreach($x['odts_id'] as $key => $value) {
                DB::table('operations_dispatch_tripping_secondary')
                    ->where('id','=', $value)
                    ->update(
                        array(
                            'activity'              => $x['activity'][$key],
                            'remarks'               => $x['remarks'][$key],
                        )
                    );
            }

        return $z;
    }

    public static function checkDispatchmentTrippingReport($x)
    {
        $z = DB::table('operations_dispatch_tripping_main')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'checked_by'                => auth::user()->id,
                    'checked_at'                => date("Y-m-d H:i:s"),
                    'status'                    => 'Checked',
                )
            );

        if($z == true){
            $notif = DB::table('notification')
                ->where('module', '=', 'Operations and Utilization Report')
                ->where('module_id', '=', $x['id'])
                ->update(
                    array(
                        'done_by'           => auth::user()->id,
                        'done_at'           => date("Y-m-d H:i:s"),
                        'status'            => 'Completed'
                    )
                );
            }
            $notif = DB::table('notification')
                ->insert(
                    array(
                        'module'            => 'Operations and Utilization Report',
                        'module_id'         => $x['id'],
                        'url'               => 'viewDispatchTripping=mcukBsRETf'.$x['id'].'LkBYTWLkpCRpVSFNDszaBLVWkujqXvKxYEFkQLq',
                        'requested_action'  => 'For Reviewing',
                        'requested_by'      => auth::user()->id,
                        'requested_at'      => date("Y-m-d H:i:s")
                    )
            );
        return $z;
    }

    public static function reviewDispatchmentTrippingReport($x)
    {
        $z = DB::table('operations_dispatch_tripping_main')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'reviewed_by'                => auth::user()->id,
                    'reviewed_at'                => date("Y-m-d H:i:s"),
                    'status'                    => 'Reviewed',
                )
            );

        if($z == true){

            $secUp = DB::table('operations_dispatch_tripping_secondary')
                    ->where('odtm_main','=', $x['id'])
                    ->update(
                        array(
                            'checker_review_status' => 'Approved',
                        )
                    );

            $notif = DB::table('notification')
                ->where('module', '=', 'Operations and Utilization Report')
                ->where('module_id', '=', $x['id'])
                ->update(
                    array(
                        'requested_action'  => 'Completed',
                        'done_by'           => auth::user()->id,
                        'done_at'           => date("Y-m-d H:i:s"),
                        'status'            => 'Completed'
                    )
                );
            }

            $m      = DB::table('operations_dispatch_tripping_main')
                    ->where('id', '=', $x['id'])
                    ->get();

            $o      = DB::table('operations_dispatch_tripping_secondary') /*operational*/
                    ->where('odtm_main', '=', $x['id'])
                    ->where('activity', '=', 'Operational')
                    ->count();

            $s      = DB::table('operations_dispatch_tripping_secondary') /*standby*/
                    ->where('odtm_main', '=', $x['id'])
                    ->where('activity', '=', 'Standby')
                    ->count();

            $b      = DB::table('operations_dispatch_tripping_secondary') /*breakdown*/
                    ->where('odtm_main', '=', $x['id'])
                    ->where('activity', '=', 'Breakdown/Repair')
                    ->count();

            /*consumed*/
            $kmUsed         = $m[0]->odometer_total;
            $gasUsed        = $m[0]->fuel_consumption;
            $hourUsed       = $o;
            $standByUsed    = $s;
            $breakRUsed     = $b;


            $e      = DB::table('equipment')
                    ->where('id', '=', $m[0]->equipment_id)
                    ->get();

            $pType          = $e[0]->pms_type;

            $kmCur          = $e[0]->current_odometer;
            $hrCur          = $e[0]->current_hr;

            $odRun          = $e[0]->running_odometer;
            $kmRun          = $e[0]->running_km;
            $hrRun          = $e[0]->running_hr;

            $odNewCur       = ($kmCur+$kmUsed);
            $kmNewCur       = ($kmCur+$kmUsed);
            $hrNewCur       = ($hrCur+$hourUsed);

            $odNewRun       = ($odRun+$kmUsed);
            $kmNewRun       = ($kmRun+$kmUsed);
            $hrNewRun       = ($hrRun+$hourUsed);

            if($pType == '2'){
                $num            = $odNewRun; /*km*/
            }
            else{ 
                $num            = $hrNewRun; /*hr*/
            }

            $gPMS           = DB::table('pms_type')
                            ->where('pms_main_var', '=', $pType)
                            ->get();
            $arr            = [];
            foreach ($gPMS as $key => $value) {
                array_push($arr, $value->pms_milestone);
            }

            foreach ($arr as $i) {
                $smallest[$i]   = abs($i - $num);
            }
            asort($smallest);
            $nearest            = key($smallest);
            $pmsPercent         = round((($num/$nearest)*100));
            if($pmsPercent >= 90){
                $pms_status     = 'Needs PMS'; 
                $notifPMS       = DB::table('notification')
                                ->insert(
                                    array(
                                        'module'            => 'Preventive Maintenance Warning',
                                        'module_id'         => $m[0]->equipment_id,
                                        'url'               => 'preventivemaintenance',
                                        'requested_action'  => 'Preventive Maintenance',
                                        'requested_by'      => auth::user()->id,
                                        'requested_at'      => date("Y-m-d H:i:s")
                                    )
                                );

                $fPMS           = DB::table('pms_type')
                                ->where('pms_main_var', '=', $pType)
                                ->where('pms_milestone', '=', $nearest)
                                ->get();

                $pms_last_used  = $fPMS[0]->id;
            }else{
                $pms_status     = 'Not Yet';
                $pms_last_used  = null;
            }  

            $nPms   = DB::table('operations_dispatch_tripping_summary')
                    ->insert(
                        array(
                            'odtm_main'             => $x['id'],
                            'equipment_category'    => $e[0]->equipment_category,
                            'equipment_type'        => $e[0]->equipment_type,
                            'equipment_id'          => $e[0]->id,
                            'gas'                   => $gasUsed,
                            'km'                    => $kmUsed,
                            'operational'           => $hourUsed,
                            'standby'               => $standByUsed,
                            'breakdown'             => $breakRUsed,
                            'location_used'         => $m[0]->location,
                            'date_used'             => $m[0]->odt_date
                        )
                    );

            $e      = DB::table('equipment')
                    ->where('id', '=', $m[0]->equipment_id)
                    ->update(
                        array(
                            'current_odometer'      => $odNewCur,
                            'current_km'            => $kmNewCur,
                            'current_hr'            => $hrNewCur,

                            'running_odometer'      => $odNewRun,
                            'running_km'            => $kmNewRun,
                            'running_hr'            => $hrNewRun,

                            'current_location'      => $m[0]->location,
                            'pms_status'            => $pms_status,
                            'pms_last_used'         => $pms_last_used
                        )
                    );
        return $z;
    }

}