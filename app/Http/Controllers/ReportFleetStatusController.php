<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PreventiveMaintenance;
use App\Models\DispatchTrippping;
use App\Models\ReportFleetStatus;
use App\Models\Maintenance;
use App\Models\JobOrder;
use App\Models\Fleet;
use Connection;
use Validator;
use Response;
use DB;
use DomPDF;
use PDF;

class ReportFleetStatusController extends Controller
{
    public function index()
    {
        $x['equipment_list']            = Fleet::read();
        $x['equipmentType']             = Maintenance::readEquipmentType()->sortBy('et.equipment_category');
        return view('reports/equipment_overview', $x);
    }

    public function view($id)
    {
        $x['id']                        = $id;
        $x['equipment']                 = Fleet::readMainDetails($id);
        $x['operations']                = ReportFleetStatus::readSelectedEquipmentMainForViewing($id);
        $x['joborders']                 = ReportFleetStatus::readSelectedEquipmentJOForViewing($id);
        return view('reports/equipment_overview_view', $x);
    }

    public function filterEquipmentOverviewList(Request $x)
    {
        $result = ReportFleetStatus::filterEquipmentOverviewList($x);
        return \Response::json($result);
    }

    
    public function getSelectedEquipmentGasConsumptionThisYear($id)
    {
        $query = new ReportFleetStatus;
        $obj   = new \stdClass;

        $jan_admin   = $query->getGasConsumptionSelectedEquipmentJan($id);
        $feb_admin   = $query->getGasConsumptionSelectedEquipmentFeb($id);
        $mar_admin   = $query->getGasConsumptionSelectedEquipmentMar($id);
        $apr_admin   = $query->getGasConsumptionSelectedEquipmentApr($id);
        $may_admin   = $query->getGasConsumptionSelectedEquipmentMay($id);
        $jun_admin   = $query->getGasConsumptionSelectedEquipmentJun($id);
        $jul_admin   = $query->getGasConsumptionSelectedEquipmentJul($id);
        $aug_admin   = $query->getGasConsumptionSelectedEquipmentAug($id);
        $sep_admin   = $query->getGasConsumptionSelectedEquipmentSep($id);
        $oct_admin   = $query->getGasConsumptionSelectedEquipmentOct($id);
        $nov_admin   = $query->getGasConsumptionSelectedEquipmentNov($id);
        $dec_admin   = $query->getGasConsumptionSelectedEquipmentDec($id);


        $obj->labels   =  array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
        $data          =  array($jan_admin, $feb_admin, $mar_admin, $apr_admin, $may_admin, $jun_admin, $jul_admin, $aug_admin, $sep_admin, $oct_admin, $nov_admin, $dec_admin);
        $datasets      =  array(
                                'label'             => "Gas Consumed Km/L",
                                'lineTension'       => 0,
                                'data'              => $data,
                                'borderWidth'       => 1,
                                'backgroundColor'   => ['rgb(20,125,142)'],
                                'borderColor'       => ['rgba(0,0,0,1)']
                            );
        $obj->datasets = [$datasets];
        return response()->json($obj);
    }
}