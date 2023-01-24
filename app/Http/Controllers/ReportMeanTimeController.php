<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ReportMeanTimeMajor;
use App\Models\ReportMeanTimeMinor;
use App\Models\ReportMeanTimeMajorHours;
use App\Models\ReportMeanTimeMinorHours;
use App\Models\Maintenance;
use Connection;
use Validator;
use Response;
use DB;
use DomPDF;
use PDF;

class ReportMeanTimeController extends Controller
{
    public function index()
    {
        $x['category']              = Maintenance::readEquipmentCategory();
        $x['type']                  = Maintenance::readEquipmentType();
        return view('reports/mean_time_repair', $x);
    }

    public function getMeanTimeReportBaseOnFilterMajor(Request $x)
    {
        $major          = new ReportMeanTimeMajor;


        $rmtMajorJan   = $major->rmtMajorJan($x);
        $rmtMajorFeb   = $major->rmtMajorFeb($x);
        $rmtMajorMar   = $major->rmtMajorMar($x);
        $rmtMajorApr   = $major->rmtMajorApr($x);
        $rmtMajorMay   = $major->rmtMajorMay($x);
        $rmtMajorJun   = $major->rmtMajorJun($x);
        $rmtMajorJul   = $major->rmtMajorJul($x);
        $rmtMajorAug   = $major->rmtMajorAug($x);
        $rmtMajorSep   = $major->rmtMajorSep($x);
        $rmtMajorOct   = $major->rmtMajorOct($x);
        $rmtMajorNov   = $major->rmtMajorNov($x);
        $rmtMajorDec   = $major->rmtMajorDec($x);
        $major    = array(
                $rmtMajorJan,
                $rmtMajorFeb,
                $rmtMajorMar,
                $rmtMajorApr,
                $rmtMajorMay,
                $rmtMajorJun,
                $rmtMajorJul,
                $rmtMajorAug,
                $rmtMajorSep,
                $rmtMajorOct,
                $rmtMajorNov,
                $rmtMajorDec
            );
        return \Response::json($major);
    }

    public function getMeanTimeReportBaseOnFilterMinor(Request $x)
    {
        $minor          = new ReportMeanTimeMinor;


        $rmtMinorJan   = $minor->rmtMinorJan($x);
        $rmtMinorFeb   = $minor->rmtMinorFeb($x);
        $rmtMinorMar   = $minor->rmtMinorMar($x);
        $rmtMinorApr   = $minor->rmtMinorApr($x);
        $rmtMinorMay   = $minor->rmtMinorMay($x);
        $rmtMinorJun   = $minor->rmtMinorJun($x);
        $rmtMinorJul   = $minor->rmtMinorJul($x);
        $rmtMinorAug   = $minor->rmtMinorAug($x);
        $rmtMinorSep   = $minor->rmtMinorSep($x);
        $rmtMinorOct   = $minor->rmtMinorOct($x);
        $rmtMinorNov   = $minor->rmtMinorNov($x);
        $rmtMinorDec   = $minor->rmtMinorDec($x);
        $minor   = array(
                $rmtMinorJan,
                $rmtMinorFeb,
                $rmtMinorMar,
                $rmtMinorApr,
                $rmtMinorMay,
                $rmtMinorJun,
                $rmtMinorJul,
                $rmtMinorAug,
                $rmtMinorSep,
                $rmtMinorOct,
                $rmtMinorNov,
                $rmtMinorDec    
            );
        return \Response::json($minor);
    }

    public function getMeanTimeReportBaseOnFilterMajorHours(Request $x)
    {
        $major          = new ReportMeanTimeMajorHours;


        $rmtMajorJan   = $major->rmtMajorJan($x);
        $rmtMajorFeb   = $major->rmtMajorFeb($x);
        $rmtMajorMar   = $major->rmtMajorMar($x);
        $rmtMajorApr   = $major->rmtMajorApr($x);
        $rmtMajorMay   = $major->rmtMajorMay($x);
        $rmtMajorJun   = $major->rmtMajorJun($x);
        $rmtMajorJul   = $major->rmtMajorJul($x);
        $rmtMajorAug   = $major->rmtMajorAug($x);
        $rmtMajorSep   = $major->rmtMajorSep($x);
        $rmtMajorOct   = $major->rmtMajorOct($x);
        $rmtMajorNov   = $major->rmtMajorNov($x);
        $rmtMajorDec   = $major->rmtMajorDec($x);
        $major    = array(
                $rmtMajorJan,
                $rmtMajorFeb,
                $rmtMajorMar,
                $rmtMajorApr,
                $rmtMajorMay,
                $rmtMajorJun,
                $rmtMajorJul,
                $rmtMajorAug,
                $rmtMajorSep,
                $rmtMajorOct,
                $rmtMajorNov,
                $rmtMajorDec
            );
        return \Response::json($major);
    }

    public function getMeanTimeReportBaseOnFilterMinorHours(Request $x)
    {
        $minor          = new ReportMeanTimeMinorHours;


        $rmtMinorJan   = $minor->rmtMinorJan($x);
        $rmtMinorFeb   = $minor->rmtMinorFeb($x);
        $rmtMinorMar   = $minor->rmtMinorMar($x);
        $rmtMinorApr   = $minor->rmtMinorApr($x);
        $rmtMinorMay   = $minor->rmtMinorMay($x);
        $rmtMinorJun   = $minor->rmtMinorJun($x);
        $rmtMinorJul   = $minor->rmtMinorJul($x);
        $rmtMinorAug   = $minor->rmtMinorAug($x);
        $rmtMinorSep   = $minor->rmtMinorSep($x);
        $rmtMinorOct   = $minor->rmtMinorOct($x);
        $rmtMinorNov   = $minor->rmtMinorNov($x);
        $rmtMinorDec   = $minor->rmtMinorDec($x);
        $minor   = array(
                $rmtMinorJan,
                $rmtMinorFeb,
                $rmtMinorMar,
                $rmtMinorApr,
                $rmtMinorMay,
                $rmtMinorJun,
                $rmtMinorJul,
                $rmtMinorAug,
                $rmtMinorSep,
                $rmtMinorOct,
                $rmtMinorNov,
                $rmtMinorDec    
            );
        return \Response::json($minor);
    }
}