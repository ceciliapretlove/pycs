<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PreventiveMaintenance;
use App\Models\DispatchTrippping;
use App\Models\ReportFleetStatus;
use App\Models\ReportEquipmentStatus;
use App\Models\Maintenance;
use App\Models\JobOrder;
use App\Models\Fleet;
use Connection;
use Validator;
use Response;
use DB;
use DomPDF;
use PDF;

class ReportEquipmentStatusController extends Controller
{
    public function index()
    {
    	$x['equipment']		= Fleet::read();
        $x['location']      = Maintenance::readLocation();
        $x['category']      = Maintenance::readEquipmentCategory();
        $x['type']          = Maintenance::readEquipmentType();
        return view('reports/equipment_status', $x);
    }

    public function getEquipmentsBaseOnFilter(Request $x)
    {
        $result = ReportEquipmentStatus::getEquipmentsBaseOnFilter($x);
        return \Response::json($result);
    }

    public function getOperationBaseOnFilter(Request $x)
    {
    	$result = ReportEquipmentStatus::getOperationBaseOnFilter($x);
        return \Response::json($result);
    }

    public function getRepairsBaseOnFilter(Request $x)
    {
        $result = ReportEquipmentStatus::getRepairsBaseOnFilter($x);
        return \Response::json($result);
    }

    public function getBreakdownBaseOnFilter(Request $x)
    {
        $result = ReportEquipmentStatus::getBreakdownBaseOnFilter($x);
        return \Response::json($result);
    }
}