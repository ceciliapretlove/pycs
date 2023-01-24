<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PreventiveMaintenance;
use App\Models\ReportGasConsumptionAllThisYear;
use App\Models\ReportGasConsumptionReport;
use App\Models\ReportGasConsumptionLight;
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

class ReportGasConsumptionController extends Controller
{
    public function index()
    {
        $x['hex1']                  = '1';
        $x['hex2']                  = '1';
        $x['gasTopFiveAll']         = ReportGasConsumptionReport::gasTopFiveAll();
        $x['gasTopFiveYear']        = ReportGasConsumptionReport::gasTopFiveYear();
        $x['category']              = Maintenance::readEquipmentCategory();
        $x['type']                  = Maintenance::readEquipmentType();
        return view('reports/gasconsumption', $x);
    }

    public function getGasConsumptionBaseOnFilter(Request $x)
    {
        
        $query = new ReportGasConsumptionReport;
        $obj   = new \stdClass;

        $jan_admin   = $query->getGasConsumptionBaseOnFilterJan($x);
        $feb_admin   = $query->getGasConsumptionBaseOnFilterFeb($x);
        $mar_admin   = $query->getGasConsumptionBaseOnFilterMar($x);
        $apr_admin   = $query->getGasConsumptionBaseOnFilterApr($x);
        $may_admin   = $query->getGasConsumptionBaseOnFilterMay($x);
        $jun_admin   = $query->getGasConsumptionBaseOnFilterJun($x);
        $jul_admin   = $query->getGasConsumptionBaseOnFilterJul($x);
        $aug_admin   = $query->getGasConsumptionBaseOnFilterAug($x);
        $sep_admin   = $query->getGasConsumptionBaseOnFilterSep($x);
        $oct_admin   = $query->getGasConsumptionBaseOnFilterOct($x);
        $nov_admin   = $query->getGasConsumptionBaseOnFilterNov($x);
        $dec_admin   = $query->getGasConsumptionBaseOnFilterDec($x);


        $obj->labels   =  array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
        $data          =  array($jan_admin, $feb_admin, $mar_admin, $apr_admin, $may_admin, $jun_admin, $jul_admin, $aug_admin, $sep_admin, $oct_admin, $nov_admin, $dec_admin);
        $datasets      =  array(
                        'label'             => "Liters",
                        'lineTension'       => 0,
                        'data'              => $data,
                        'borderWidth'       => 1,
                        'backgroundColor'   => ['rgb(229,229,229)'],
                        'borderColor'       => ['rgb(229,229,229)']
                    );
        $obj->datasets = [$datasets];
        return response()->json($obj);
    }

    // public function getGasConsumptionHeavy()
    // {
    //     $query = new ReportGasConsumptionHeavy;
    //     $obj   = new \stdClass;

    //     $jan_admin   = $query->getGasConsumptionHeavyJan();
    //     $feb_admin   = $query->getGasConsumptionHeavyFeb();
    //     $mar_admin   = $query->getGasConsumptionHeavyMar();
    //     $apr_admin   = $query->getGasConsumptionHeavyApr();
    //     $may_admin   = $query->getGasConsumptionHeavyMay();
    //     $jun_admin   = $query->getGasConsumptionHeavyJun();
    //     $jul_admin   = $query->getGasConsumptionHeavyJul();
    //     $aug_admin   = $query->getGasConsumptionHeavyAug();
    //     $sep_admin   = $query->getGasConsumptionHeavySep();
    //     $oct_admin   = $query->getGasConsumptionHeavyOct();
    //     $nov_admin   = $query->getGasConsumptionHeavyNov();
    //     $dec_admin   = $query->getGasConsumptionHeavyDec();


    //     $obj->labels   =  array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
    //     $data          =  array($jan_admin, $feb_admin, $mar_admin, $apr_admin, $may_admin, $jun_admin, $jul_admin, $aug_admin, $sep_admin, $oct_admin, $nov_admin, $dec_admin);
    //     $datasets      =  array(
    //                             'label'             => "Gas Consumed Km/L",
    //                             'lineTension'       => 0,
    //                             'data'              => $data,
    //                             'borderWidth'       => 1,
    //                             'backgroundColor'   => ['rgb(20,125,142)'],
    //                             'borderColor'       => ['rgba(0,0,0,1)']
    //                         );
    //     $obj->datasets = [$datasets];
    //     return response()->json($obj);
    // }

    // public function getGasConsumptionLight()
    // {
    //     $query = new ReportGasConsumptionLight;
    //     $obj   = new \stdClass;

    //     $jan_admin   = $query->getGasConsumptionLightJan();
    //     $feb_admin   = $query->getGasConsumptionLightFeb();
    //     $mar_admin   = $query->getGasConsumptionLightMar();
    //     $apr_admin   = $query->getGasConsumptionLightApr();
    //     $may_admin   = $query->getGasConsumptionLightMay();
    //     $jun_admin   = $query->getGasConsumptionLightJun();
    //     $jul_admin   = $query->getGasConsumptionLightJul();
    //     $aug_admin   = $query->getGasConsumptionLightAug();
    //     $sep_admin   = $query->getGasConsumptionLightSep();
    //     $oct_admin   = $query->getGasConsumptionLightOct();
    //     $nov_admin   = $query->getGasConsumptionLightNov();
    //     $dec_admin   = $query->getGasConsumptionLightDec();


    //     $obj->labels   =  array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
    //     $data          =  array($jan_admin, $feb_admin, $mar_admin, $apr_admin, $may_admin, $jun_admin, $jul_admin, $aug_admin, $sep_admin, $oct_admin, $nov_admin, $dec_admin);
    //     $datasets      =  array(
    //                             'label'             => "Gas Consumed Km/L",
    //                             'lineTension'       => 0,
    //                             'data'              => $data,
    //                             'borderWidth'       => 1,
    //                             'backgroundColor'   => ['rgb(0,191,165)'],
    //                             'borderColor'       => ['rgba(0,0,0,1)']
    //                         );
    //     $obj->datasets = [$datasets];
    //     return response()->json($obj);
    // }

    public function getAllGasCosumptionThisYear()
    {
        $query = new ReportGasConsumptionAllThisYear;
        $obj   = new \stdClass;

        $jan_admin   = $query->getGasConsumptionAllThisYearJan();
        $feb_admin   = $query->getGasConsumptionAllThisYearFeb();
        $mar_admin   = $query->getGasConsumptionAllThisYearMar();
        $apr_admin   = $query->getGasConsumptionAllThisYearApr();
        $may_admin   = $query->getGasConsumptionAllThisYearMay();
        $jun_admin   = $query->getGasConsumptionAllThisYearJun();
        $jul_admin   = $query->getGasConsumptionAllThisYearJul();
        $aug_admin   = $query->getGasConsumptionAllThisYearAug();
        $sep_admin   = $query->getGasConsumptionAllThisYearSep();
        $oct_admin   = $query->getGasConsumptionAllThisYearOct();
        $nov_admin   = $query->getGasConsumptionAllThisYearNov();
        $dec_admin   = $query->getGasConsumptionAllThisYearDec();


        $obj->labels   =  array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
        $data          =  array($jan_admin, $feb_admin, $mar_admin, $apr_admin, $may_admin, $jun_admin, $jul_admin, $aug_admin, $sep_admin, $oct_admin, $nov_admin, $dec_admin);
        $datasets      =  array(
                                'label'             => "Gas Consumed",
                                'lineTension'       => 0,
                                'data'              => $data,
                                'borderWidth'       => 1,
                                'backgroundColor'   => ['rgb(0,191,165)'],
                                'borderColor'       => ['rgba(0,0,0,1)']
                            );
        $obj->datasets = [$datasets];
        return response()->json($obj);
    }
}