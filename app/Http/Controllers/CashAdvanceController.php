<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\CashAdvance;
use App\Models\BillOfLading;
use App\Models\Broker;
use DomPDF;
use PDF;
use Connection;
use Validator;
use Response;
use DB;

class CashAdvanceController extends Controller
{

    public function index()
    {
        $x['cashAdvance_list'] = CashAdvance::readCashAdvance();
        return view('cash_advance/index',$x);
    }

    public function sortByDate(Request $x)
    {
        $sortBydate  = DB::table('cash_advance')
                ->select('*')
                ->whereDate('date', '=', $x['date'])
        ->get();
        return \Response::json($sortBydate);
    }


    public function addCashAdvance()
    {
        $x['particular_list'] = Maintenance::readParticular();
        return view('cash_advance/create',$x);
    }

    public function action(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('bill_of_lading_management as bolm')
                        ->select("*")
                        ->where('bolm.pro_number', 'LIKE','%'.$query.'%')
            
                        ->get();
        return response()->json($filter_data);


    }

    public function particular(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('particular_management as pm')
                        ->select("*")
                        ->where('pm.particular', 'LIKE','%'.$query.'%')
                        ->get();
        return response()->json($filter_data);


    }

    
    public function createCashAdvance(Request $x)
    {
       $result = CashAdvance::createCashAdvance($x);
        return \Response::json($result);
    }

    public function viewCashAdvance($id)
    {
        $x['id']           = $id;
        $x['cashAdvance']  = CashAdvance::viewCashAdvance($id);
       return view('cash_advance/view',$x);
    }
     public function getCashAdvance($id)
    {
        $x['id']           = $id;
        $x['fetch_cashAdvance']  = CashAdvance::viewCashAdvance($id);
       return view('cash_advance/update',$x);
    }

        public function updateCashAdvance(Request $x)
    {
        $result = CashAdvance::updateCashAdvance($x);
        return \Response::json($result);
    }
    
    public function releaseCashadvance(Request $x)
    {
        $result = CashAdvance::releaseCashadvance($x);
        return \Response::json($result);
    }

    public function editCashAdvance($id)
    {
        $x['id']                             = $id;
        $x['fetch_cashadvance']              = CashAdvance::fetchCashAdvance($id);
        $x['fetch_cashadvance_particular']   = CashAdvance::fetchCashAdvanceParticular($id);
        $x['fetch_cashadvance_amount']       = CashAdvance::fetchCashAdvanceAmount($id);
        $x['particular_list']                = Maintenance::readParticular();
        // dd($x['fetch_cashadvance']);
        return view('cash_advance/update', $x);
    }

    public function getCashAdvanceParticular(Request $x)
    { 
        $result = CashAdvance::getCashAdvanceParticular($x);
        return \Response::json($result);
    }

    public function updateCashAdvanceParticular(Request $x)
    {
        $result = CashAdvance::updateCashAdvanceParticular($x);
        return \Response::json($result);
    }

    public function deleteCashAdvanceParticular( request $request)
    {
        $result = CashAdvance::deleteCashAdvanceParticular($request);
        return \Response::json($result);
    }

    public function viewCashAdvanceForm($id)
    {
        $x['id']                             = $id;
        $x['fetch_cashadvance']              = CashAdvance::fetchCashAdvance($id);
        $x['fetch_cashadvance_particular']   = CashAdvance::fetchCashAdvanceParticular($id);
        $x['fetch_cashadvance_amount']       = CashAdvance::fetchCashAdvanceAmount($id);
        $x['particular_list']                = Maintenance::readParticular();

        // dd($x);
        return view('cash_advance/view', $x);
    }

    //Check Payment Request Form

    public function CheckPaymentRequestForm()
    {
        $x['check_payment_list'] = CashAdvance::readCheckPaymentRequest();
        // dd($x['check_payment_list']);
        return view('check_payment/index', $x);
    }

    public function addCheckPaymentRequestForm()
    {
        return view('check_payment/create');
    }


    public function checkrequest(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('check_voucher as tv')
                        ->select(
                            'tv.pro_number as pro_number',
                            'tv.amount',
                            'ctm.code as check_type_code',
                            'ctm.description as check_type_description',
                            'ctm.id as check_type_id',
                            'pm.id as particular_id',
                            'pm.code as particular_code',
                            'pm.particular as particular_description',
                            'prep.fname as prep_fname',
                            'prep.lname as prep_lname',
                            'tv.status',
                            'tv.created_by',
                            'tv.created_at'
                        )
                        ->where('tv.pro_number', 'LIKE', ''.$query.'%')
                        ->where('tv.status', '=', 'For Releasing')
                        ->leftJoin('check_type_management as ctm', 'ctm.id', '=', 'tv.check_type')
                        ->leftJoin('particular_management as pm', 'pm.id', '=', 'tv.particular')
                        ->leftJoin('users as prep', 'prep.id', '=', 'tv.created_by')
                        ->get();
        return response()->json($filter_data);

    }

    public function releaseCheckPayment(Request $x)
    {
        $result = CashAdvance::releaseCheckPayment($x);
        return \Response::json($result);
    }
    
    // public function createCheckPaymentRequestForm(Request $x)
    // {
    //    $result = CashAdvance::createCheckPaymentRequestForm($x);
    //     return \Response::json($result);
    // }

    public function viewCheckPaymentRequestForm($id)
    {
        $x['id']           = $id;
        $x['check_payment_list']           = CashAdvance::viewCheckPaymentRequest($id);
        $x['fetch_taxvoucher_particular']  = Broker::fetchTaxVoucherParticular($id);
        $x['fetch_taxvoucher_amount']      = Broker::fetchTaxVoucherAmount($id);

       return view('check_payment/view',$x);
    }

    //  public function editCheckPaymentRequestForm($id)
    // {
    //     $x['id']           = $id;
    //     $x['check_payment_list']  = CashAdvance::viewCheckPaymentRequest($id);
        
    //     return view('check_payment/update', $x);
    // }

    // public function updateCheckPaymentRequestForm(Request $x)
    // {
    //     $result = CashAdvance::updateCheckPaymentRequestForm($x);
    //     return \Response::json($result);
    // }


    public function htmlPdf($id)
    {
        
        $x['fetch_cashAdvance']  = CashAdvance::viewCashAdvance($id);
        // dd($x);
        $pdf = PDF::loadView('cash_advance/cashAdvancePDF',$x);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('pdfview.pdf');
    }


    // public function checkPaymentRequestPdf($id)
    // {
    //     $x['check_payment_list']  = CashAdvance::viewCheckPaymentRequest($id);
    //     $x['fetch_taxvoucher_particular']  = Broker::fetchTaxVoucherParticular($id);
    //     $x['fetch_taxvoucher_amount']      = Broker::fetchTaxVoucherAmount($id);
    //     // $x['check_payment_list']  = CashAdvance::viewCheckPaymentRequest($id);
    //     // dd($x);
    //     $pdf = PDF::loadView('check_payment/checkPaymentRequestPDF',$x);
    //     $pdf->setPaper('letter', 'portrait');
    //     return $pdf->stream('pdfview.pdf');
    // }
}

