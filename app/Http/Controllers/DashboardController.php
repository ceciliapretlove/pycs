<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Refund;
use App\Models\Liquidation;
use DomPDF;
use PDF;
use Connection;
use Validator;
use Response;
use DB;

class DashboardController extends Controller
{

    public function index()
    {

        $x['total_deduction']  = Refund::readTotalDeduction();
        $x['total_refunded']  = Refund::readTotalRefunded();
        $x['total_refund']  = Refund::readTotalForRefund();
        $x['total_container_deposit']  = Refund::readTotalContainerDeposit();
        $x['liquidated']  = Liquidation::readLiquidated();
        $x['Unliquidated']  = Liquidation::readUnLiquidated();
        return view('dashboard',$x);

    }
}
