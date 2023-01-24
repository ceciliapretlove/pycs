<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ReportKilometerGetAllKilometerThisYear;
use Connection;
use Validator;
use Response;
use DB;
use DomPDF;
use PDF;

class ReportKilometerController extends Controller
{
    public function getAllKilometerThisYear()
    {
        $query = new ReportKilometerGetAllKilometerThisYear;
        $obj   = new \stdClass;

        $jan_admin   = $query->getKilometerAllThisYearJan();
        $feb_admin   = $query->getKilometerAllThisYearFeb();
        $mar_admin   = $query->getKilometerAllThisYearMar();
        $apr_admin   = $query->getKilometerAllThisYearApr();
        $may_admin   = $query->getKilometerAllThisYearMay();
        $jun_admin   = $query->getKilometerAllThisYearJun();
        $jul_admin   = $query->getKilometerAllThisYearJul();
        $aug_admin   = $query->getKilometerAllThisYearAug();
        $sep_admin   = $query->getKilometerAllThisYearSep();
        $oct_admin   = $query->getKilometerAllThisYearOct();
        $nov_admin   = $query->getKilometerAllThisYearNov();
        $dec_admin   = $query->getKilometerAllThisYearDec();


        $obj->labels   =  array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
        $data          =  array($jan_admin, $feb_admin, $mar_admin, $apr_admin, $may_admin, $jun_admin, $jul_admin, $aug_admin, $sep_admin, $oct_admin, $nov_admin, $dec_admin);
        $datasets      =  array(
                                'label'             => "Kilometer Run",
                                'lineTension'       => 0,
                                'data'              => $data,
                                'borderWidth'       => 1,
                                'backgroundColor'   => ['rgb(0,100,95)'],
                                'borderColor'       => ['rgb(0,100,95)']
                            );
        $obj->datasets = [$datasets];
        return response()->json($obj);
    }
}