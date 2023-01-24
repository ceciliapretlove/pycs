<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Broker;
use App\Models\BillOfLading;
use Connection;
use DomPDF;
use PDF;
use Validator;
use Response;
use DB;

class BrokerController extends Controller
{

    public function index()
    {
       
        $x['check_voucher_list'] = Broker::readTaxVoucher();
        return view('broker/index',$x);

    }

    public function addTaxVoucher()
    {
        $x['particular_list'] = Maintenance::readParticular();
        return view('broker/create',$x);
    }


    public function getDepositSlip(Request $x)
    {
        $result = DepositSlip::getDepositSlip($x);
        return \Response::json($result);
    }


    public function editTaxVoucher($id)
    {
        $x['id']                           = $id;
        $x['fetch_taxVoucher']             = Broker::fetchTaxVoucher($id);
        $x['fetch_taxvoucher_particular']  = Broker::fetchTaxVoucherParticular($id);
        $x['fetch_taxvoucher_amount']      = Broker::fetchTaxVoucherAmount($id);
        $x['particular_list']              = Maintenance::readParticular();
        return view('broker/update', $x);
    }

    public function viewTaxVoucher($id)
    {
        $x['id']                           = $id;
        $x['fetch_taxVoucher']             = Broker::fetchTaxVoucher($id);
        $x['fetch_taxvoucher_particular']  = Broker::fetchTaxVoucherParticular($id);
        $x['fetch_taxvoucher_amount']      = Broker::fetchTaxVoucherAmount($id);


        // dd($x['fetch_taxvoucher_amount']);
        return view('broker/view', $x);
    }

    public function createTaxVoucher(Request $x)
    {


       $result = Broker::createTaxVoucher($x);
        return \Response::json($result);
    }

    public function updateTaxVoucher(Request $x)
    {
    	$result = Broker::updateTaxVoucher($x);
        return \Response::json($result);
    }


    public function action(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('bill_of_lading_management as bolm')
                        ->select('bolm.pro_number as pro_number','bolm.customer_number','bolm.checkvoucher_status','bolm.id' )
                        ->where('bolm.pro_number', 'LIKE', ''.$query.'%')
                        // ->where('bolm.checkvoucher_status', '=', '0')
                        ->get();
        return response()->json($filter_data);
        

    }


    public function checkType(Request $request)
    {

        $data = $request->all();
        $query = $data['query'];

        $filter_data = DB::table('check_type_management')
                        ->select('*')
                        ->where('code', 'LIKE', ''.$query.'%')
                        ->get();
        return response()->json($filter_data);

    }

    public function particulars(Request $request)
    {

        $data = $request->all();
        $query = $data['query'];

        $filter_data = DB::table('particular_management')
                        ->select('*')
                        ->where('code', 'LIKE', ''.$query.'%')
                        ->get();
        return response()->json($filter_data);

    }

    public function getTaxParticular(Request $x)
    {
       
        $result = Broker::getTaxParticular($x);
        return \Response::json($result);
    }

    public function updateTaxParticular(Request $x)
    {
       
        $result = Broker::updateTaxParticular($x);
        return \Response::json($result);
    }

    public function deleteTaxParticular( request $request)
    {
        $result = Broker::deleteTaxParticular($request);
        return \Response::json($result);
    }

    public function checkPaymentRequestPdf($id)
    {   
        $x['fetch_taxVoucher']             = Broker::fetchTaxVoucher($id);
        $x['check_payment_list']           = Broker::viewCheckPaymentRequestPDF($id);
        $x['fetch_taxvoucher_particular']  = Broker::fetchTaxVoucherParticular($id);
        $x['fetch_taxvoucher_amount']      = Broker::fetchTaxVoucherAmount($id);
        $pdf = PDF::loadView('broker/checkPaymentRequestPDF',$x);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('pdfview.pdf');
    }

    public function releaseCheckPayment(Request $x)
    {
        $result = Broker::releaseCheckPayment($x);
        return \Response::json($result);
    }

    
    //Processor
    public function ProcessorForm()
    {
        $x['processor_list'] = Broker::readProcessor();
        return view('processor/index',$x);

    }

    public function addProcessorForm()
    {
        $x['particular_list'] = Maintenance::readParticular();
        return view('processor/create',$x);
    }

    public function processoraction(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('bill_of_lading_management as bolm')
                        ->select('bolm.pro_number as pro_number','bolm.customer_number','bolm.id' )
                        ->where('bolm.pro_number', 'LIKE', ''.$query.'%')
                        ->where('bolm.processor_status', '=', '0')
                        ->get();
        return response()->json($filter_data);

    }


    public function processorcheckType(Request $request)
    {

        $data = $request->all();
        $query = $data['query'];

        $filter_data = DB::table('check_type_management')
                        ->select('*')
                        ->where('code', 'LIKE', ''.$query.'%')
                        ->get();
        return response()->json($filter_data);

    }

    public function createProcessorForm(Request $x)
    {
       $result = Broker::createProcessorForm($x);
        return \Response::json($result);
    }

    public function viewProcessorForm($id)
    {
        $x['id']                           = $id;
        $x['fetch_processor']             = Broker::fetchProcessor($id);
        $x['fetch_processor_particular']  = Broker::fetchProcessParticular($id);
        $x['fetch_processor_amount']      = Broker::fetchProcessorAmount($id);

        // dd($x);
        return view('processor/view', $x);
    }

    public function editProcessorForm($id)
    {
        $x['id']                           = $id;
        $x['fetch_processor']             = Broker::fetchProcessor($id);
        $x['fetch_processor_particular']  = Broker::fetchProcessParticular($id);
        $x['fetch_processor_amount']      = Broker::fetchProcessorAmount($id);
        $x['particular_list']              = Maintenance::readParticular();
        return view('processor/update', $x);
    }

    public function updateProcessorForm(Request $x)
    {
        $result = Broker::updateProcessorForm($x);
        return \Response::json($result);
    }

    public function getProcessorParticular(Request $x)
    { 
        $result = Broker::getProcessorParticular($x);
        return \Response::json($result);
    }

    public function updateProcessorParticular(Request $x)
    {
        $result = Broker::updateProcessorParticular($x);
        return \Response::json($result);
    }

    public function deleteProcessor( request $request)
    {
        $result = Broker::deleteProcessor($request);
        return \Response::json($result);
    }
 
}