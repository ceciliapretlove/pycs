<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PreventiveMaintenance;
use App\Models\DispatchTrippping;
use App\Models\Maintenance;
use App\Models\Fleet;
use Connection;
use Validator;
use Response;
use DB;
use DomPDF;
use PDF;

class PreventiveMaintenanceController extends Controller
{
    public function index()
    {
        $x['equipment_warned_list']                 = PreventiveMaintenance::readEquipmentOnWarning();
        $x['equipment_done_list']                   = PreventiveMaintenance::readEquipmentOnWarningDone();
        $x['equipment']                             = Fleet::read();
        $x['equipment_type']                        = Fleet::read()->groupBy('equipment_type');
        return view('pms/index', $x);
    }

    public function pmsUnit($id)
    {
        $x['equipment']                     = PreventiveMaintenance::readSelectedEquipment($id);
        $x['pms_materials']                 = PreventiveMaintenance::readPMSMaterialsBaseOnRequirements($id);
        $x['warehouse_item']                = PreventiveMaintenance::readAllWarehouseItem();
        $x['reported_by']                   = Maintenance::readAccount();
        $x['inspected_by']                  = Maintenance::readAccount();
        $x['conducted_by']                  = Maintenance::readAccount();
        $x['trial_personnel_by']            = Maintenance::readAccount();
        $x['location']                      = Maintenance::readLocation();
        return view('pms/pms_unit', $x);
    }

    public function getWarehouseItem(Request $x)
    {
        $result = PreventiveMaintenance::getWarehouseItem($x);
        return \Response::json($result);
    }

    public function createJobOrder(Request $x)
    {
        $result = PreventiveMaintenance::createJobOrder($x);
        return \Response::json($result);
    }

    public function joborder()
    {
        $pdf = PDF::loadView('pms/jobOrder');
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('JobOrder.pdf');
    }

    
}