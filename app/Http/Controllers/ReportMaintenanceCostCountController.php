<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ReportMaintenanceCostCount;
use App\Models\PreventiveMaintenance;
use App\Models\DispatchTrippping;
use App\Models\ReportUtilization;
use App\Models\Maintenance;
use App\Models\JobOrder;
use App\Models\Fleet;
use Connection;
use Validator;
use Response;
use DB;
use DomPDF;
use PDF;

class ReportMaintenanceCostCountController extends Controller
{
    public function index()
    {
        $x['hex1']                  = 1;
        $x['hex2']                  = 1;
    	$x['overall_cost']          = ReportMaintenanceCostCount::getCostOverall();
        $x['year_cost']             = ReportMaintenanceCostCount::getCostYear();
        $x['category']              = Maintenance::readEquipmentCategory();
        $x['type']                  = Maintenance::readEquipmentType();
        return view('reports/maintenance_cost', $x);
    }

    public function generateFilterCost(Request $x)
    {
        $result = ReportMaintenanceCostCount::generateFilterCost($x); 
        return \Response::json($result);
    }
}