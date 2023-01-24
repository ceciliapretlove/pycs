<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Liquidation;
use App\Models\BillOfLading;
use DomPDF;
use PDF;
use Connection;
use Validator;
use Response;
use DB;

class LiquidationController extends Controller
{

    public function index()
    {

        $x['liquidation_list'] = Liquidation::readLiquidation();
   
        return view('liquidation/index',$x);

    }

    public function addLiquidation()
    {

       $x['consignee']  = Maintenance::readConsignee();
       $x['bol']        = BillOfLading::read();
       $x['user']        = Liquidation::selectProcessor();
       $x['particular_list'] = Maintenance::readParticular();
       $x['particular'] = Maintenance::readParticular();

       return view('liquidation/create',$x);
    }


    public function getLiquidation(Request $x)
    {
        $result = Liquidation::getLiquidation($x);
        return \Response::json($result);
    }


    public function getLiquidationDetails($id)
    {
       $x['id']                 = $id;
       $x['fetch_liquidation']  = Liquidation::getLiquidation($id);
       $x['fetch_particular']   = Liquidation::getLiquidationParticulars($id);
       $x['particular']         = Maintenance::readParticular();
       // $x['expenses']           = Liquidation::sumParticulars($id);
        return view('liquidation/update', $x);
    }

    public function createLiquidation(Request $x)
    {
 
       $result = Liquidation::createLiquidation($x);
        return \Response::json($result);
    }

    public function editLiquidation(Request $x)
    {
    	$result = Liquidation::editLiquidation($x);
        return \Response::json($result);
    }

    public function viewLiquidationDetails($id)
    {
       $x['id']                 = $id;
       $x['fetch_liquidation']  = Liquidation::viewLiquidation($id);
       // $x['fetch_liquidationDetails']   = Liquidation::getLiquidation($id);
       // $x['fetch_particular']   = Liquidation::getLiquidationParticulars($id);
       // $x['expenses']           = Liquidation::sumParticulars($id);
       // dd($x);
        return view('liquidation/view', $x);
    }


    public function action(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('bill_of_lading_management as bolm')
                        ->select(
                            'bolm.id as bolm_id',
                            'bolm.pro_number as pro_number',
                            'bolm.bl_number as bl_number',
                            'tx.id as check_voucher_id',
                            'cm.consignee as consignee',
                        )

                        ->leftJoin('consignee_management as cm', 'cm.id', '=', 'bolm.consignee_id')
                        ->leftJoin('check_voucher as tx', 'tx.pro_number', '=', 'bolm.pro_number')
                        ->where('bolm.pro_number', 'LIKE', ''.$query.'%')
                        ->where('liq_status', '=','0')

                        ->get()

                        ->map(function($item){
                            
                            $item->{'bolc'} =   DB::table('bill_of_lading_containers')
                            ->where('bill_of_lading_id',$item->bolm_id)
                            ->get(); 

                            $item->{'check_voucher'} =   DB::table('check_voucher_child as cvc')

                            ->select('*',
                                'cvc.particular as particular_id',
                                'bolm.id as bill_id',
                                'cvc.amount as amount'
                            )
                            ->where('cv.status','Released')
                            ->where('cvc.status','0')
                            ->leftJoin('check_voucher as cv', 'cv.id', '=', 'cvc.check_voucher_id')
                            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'cv.pro_number')
                            ->leftJoin('particular_management as pm', 'pm.id', '=', 'cvc.particular')
                            ->where('cv.pro_number',$item->bolm_id)
                            ->get(); 

                            $item->{'cash_advance'} =   DB::table('cash_advance as ca')
                            ->select('*',
                                'ca.id as id',
                                'pm.particular as particular',
                                'cac.or_num as or_num',
                                'cac.other as other',
                                'cac.amount as amount',
                                'bolm.pro_number as pro_number',
                                'bolm.id as bill_id',
                                'cac.particular as particular_id'

                            )
                            ->where('bill_id',$item->bolm_id)
                            ->where('ca.status','Released')
                             ->where('cac.status','0')
                            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'ca.bill_id')
                            ->leftJoin('cash_advance_child as cac', 'cac.cashadvance_id', '=', 'ca.id')
                            ->leftJoin('particular_management as pm', 'pm.id', '=', 'cac.particular')
                            
                            ->get(); 

     
                            return $item;
                        });

        return response()->json($filter_data);

    }

    

    public function deleteParticular( request $request)
    {
        $result = Liquidation::deleteParticular($request);
        return \Response::json($result);
    }

    public function getParticular(Request $x)
    {
       
        $result = Liquidation::getParticular($x);
        return \Response::json($result);
    }

    public function updateParticular(Request $x)
    {
       
        $result = Liquidation::updateParticular($x);
        return \Response::json($result);
    }


    
    public function payeeaction(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('shipping_line_management')
                        ->select("*")
                        ->where('shipping_line', 'LIKE', '%'.$query.'%')
                        
                        ->get();
        return response()->json($filter_data);

    }

    public function actionsummaryExpenses(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('bill_of_lading_management as bolm')
                        ->select(
                            'bolm.pro_number as pro_number',
                            'bolm.bl_number',
                            'cm.consignee as consignee',
                            'cm.id as consignee_id',
                            'ca.received_amount as cash_advance',
                            'ca.status as ca_status',
                            'tx.particular',
                            'tx.amount as particular_amount',
                            'pm.particular as particular_name',
                            'bolm.estimated_time_arrival',
                            'prtm.port',
                            'bolm.description',
                            'prtm.id as port_id'
                            
                        )
                        ->leftJoin('consignee_management as cm', 'cm.id', '=', 'bolm.consignee_id')
                        ->leftJoin('cash_advance as ca', 'ca.bill_id', '=', 'bolm.id')
                        ->leftJoin('port_management as prtm', 'prtm.id', '=', 'bolm.port_loading')
                        ->leftJoin('check_request_form as crf', 'crf.job_file_id', '=', 'bolm.id')
                        ->leftJoin('check_voucher as tx', 'tx.pro_number', '=', 'bolm.id')
                        ->leftJoin('particular_management as pm', 'pm.id', '=', 'tx.particular')
                        ->where('bolm.pro_number', 'LIKE', ''.$query.'%')
                        ->where('ca.status', '=','Released')
                        ->get();
        return response()->json($filter_data);

    }

    public function createbreakdownItem(Request $x)
    {
        $result = Liquidation::createbreakdownItem($x);
        return \Response::json($result);
    }

    public function htmlPdf($id)
    {
        $x['fetch_liquidationDetails']   = Liquidation::getLiquidation($id);
        $pdf = PDF::loadView('liquidation/liquidationPDF',$x);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('pdfview.pdf');
    }

    public function getSelectedProcessorID(Request $x)
    {
        $result = Liquidation::getSelectedProcessorID($x);
        return \Response::json($result);
    }
        public function getReleasedCashAdvanceID(Request $x)
    {
        $result = Liquidation::getReleasedCashAdvanceID($x);
        return \Response::json($result);
    }
    public function getProcessingRequest(Request $x)
    {
        $result = Liquidation::getProcessingRequest($x);
        return \Response::json($result);
    }


//Summary of Expenses

        public function summaryofexpenses()
    {

        // $x['summary_list'] = Liquidation::readLiquidation();
   
        return view('summary_of_expenses/index');

    }
}
