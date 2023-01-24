<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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

class ReportUtilizationController extends Controller
{
    public function index()
    {
        $x['category']      = Maintenance::readEquipmentCategory();
        $x['type']          = Maintenance::readEquipmentType();
        return view('reports/utilization', $x);
    }

    public function getUtilizationOperationsBaseOnFilter(Request $x)
    {
        $result = ReportUtilization::getUtilizationOperationsBaseOnFilter($x);
        return \Response::json($result);
    }

    public function getUtilizationBaseOnFilter(Request $x)
    {
        $query = new ReportUtilization;
        $obj   = new \stdClass;

        $jan_admin   = $query->getUtilizationBaseOnFilterJan($x);
        $feb_admin   = $query->getUtilizationBaseOnFilterFeb($x);
        $mar_admin   = $query->getUtilizationBaseOnFilterMar($x);
        $apr_admin   = $query->getUtilizationBaseOnFilterApr($x);
        $may_admin   = $query->getUtilizationBaseOnFilterMay($x);
        $jun_admin   = $query->getUtilizationBaseOnFilterJun($x);
        $jul_admin   = $query->getUtilizationBaseOnFilterJul($x);
        $aug_admin   = $query->getUtilizationBaseOnFilterAug($x);
        $sep_admin   = $query->getUtilizationBaseOnFilterSep($x);
        $oct_admin   = $query->getUtilizationBaseOnFilterOct($x);
        $nov_admin   = $query->getUtilizationBaseOnFilterNov($x);
        $dec_admin   = $query->getUtilizationBaseOnFilterDec($x);


        $obj->labels   =  array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
        $data          =  array($jan_admin, $feb_admin, $mar_admin, $apr_admin, $may_admin, $jun_admin, $jul_admin, $aug_admin, $sep_admin, $oct_admin, $nov_admin, $dec_admin);
        $datasets      =  array(
                        'label'             => "Utilization Percent",
                        'lineTension'       => 0,
                        'data'              => $data,
                        'borderWidth'       => 1,
                        'backgroundColor'   => ['rgb(229,229,229)'],
                        'borderColor'       => ['rgb(229,229,229)']
                    );
        $obj->datasets = [$datasets];
        return response()->json($obj);
    }

    // public function getHeavyUtilization()
    // {
    //     $query = new ReportUtilization;
    //     $obj   = new \stdClass;

    //     $jan_admin   = number_format($query->getUtilizationHeavyJan(),2);
    //     $feb_admin   = number_format($query->getUtilizationHeavyFeb(),2);
    //     $mar_admin   = number_format($query->getUtilizationHeavyMar(),2);
    //     $apr_admin   = number_format($query->getUtilizationHeavyApr(),2);
    //     $may_admin   = number_format($query->getUtilizationHeavyMay(),2);
    //     $jun_admin   = number_format($query->getUtilizationHeavyJun(),2);
    //     $jul_admin   = number_format($query->getUtilizationHeavyJul(),2);
    //     $aug_admin   = number_format($query->getUtilizationHeavyAug(),2);
    //     $sep_admin   = number_format($query->getUtilizationHeavySep(),2);
    //     $oct_admin   = number_format($query->getUtilizationHeavyOct(),2);
    //     $nov_admin   = number_format($query->getUtilizationHeavyNov(),2);
    //     $dec_admin   = number_format($query->getUtilizationHeavyDec(),2);


    //     $obj->labels   =  array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
    //     $data          =  array($jan_admin, $feb_admin, $mar_admin, $apr_admin, $may_admin, $jun_admin, $jul_admin, $aug_admin, $sep_admin, $oct_admin, $nov_admin, $dec_admin);
    //     $datasets      =  array(
    //                             'label'             => "Utilization Percent",
    //                             'lineTension'       => 0,
    //                             'data'              => $data,
    //                             'borderWidth'       => 1,
    //                             'backgroundColor'   => ['rgb(229,229,229)'],
    //                             'borderColor'       => ['rgb(229,229,229)']
    //                         );
    //     $obj->datasets = [$datasets];
    //     return response()->json($obj);
    // }

    // public function getLightUtilization()
    // {
    //     $query = new ReportUtilization;
    //     $obj   = new \stdClass;

    //     $jan_admin   = number_format($query->getUtilizationLightJan(),2);
    //     $feb_admin   = number_format($query->getUtilizationLightFeb(),2);
    //     $mar_admin   = number_format($query->getUtilizationLightMar(),2);
    //     $apr_admin   = number_format($query->getUtilizationLightApr(),2);
    //     $may_admin   = number_format($query->getUtilizationLightMay(),2);
    //     $jun_admin   = number_format($query->getUtilizationLightJun(),2);
    //     $jul_admin   = number_format($query->getUtilizationLightJul(),2);
    //     $aug_admin   = number_format($query->getUtilizationLightAug(),2);
    //     $sep_admin   = number_format($query->getUtilizationLightSep(),2);
    //     $oct_admin   = number_format($query->getUtilizationLightOct(),2);
    //     $nov_admin   = number_format($query->getUtilizationLightNov(),2);
    //     $dec_admin   = number_format($query->getUtilizationLightDec(),2);


    //     $obj->labels   =  array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
    //     $data          =  array($jan_admin, $feb_admin, $mar_admin, $apr_admin, $may_admin, $jun_admin, $jul_admin, $aug_admin, $sep_admin, $oct_admin, $nov_admin, $dec_admin);
    //     $datasets      =  array(
    //                             'label'             => "Utilization Percent",
    //                             'lineTension'       => 0,
    //                             'data'              => $data,
    //                             'borderWidth'       => 1,
    //                             'backgroundColor'   => ['rgb(229,229,229)'],
    //                             'borderColor'       => ['rgb(229,229,229)']
    //                         );
    //     $obj->datasets = [$datasets];
    //     return response()->json($obj);
    // }
}