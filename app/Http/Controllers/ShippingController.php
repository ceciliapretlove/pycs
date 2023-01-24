<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Shipping;
use App\Models\BillOfLading;
use DomPDF;
use PDF;
use Connection;
use Validator;
use Response;
use DB;

class ShippingController extends Controller
{

    public function index()
    {
       
        $shipping_list = \DB::table('shipping as s')
        ->select(
                's.id as id',
                'bolm.pro_number as pro_number',
                'bolm.bl_number as bl_number',
                's.totalAmount',
                's.shipping_allowance',
                's.grand_total',
                's.status',
                's.created_at',
                's.status_date',
                's.created_at',
            )
        ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 's.bl_id')
        ->orderBy('s.created_at', 'desc')
        ->get();
        return view('shipping/index', compact('shipping_list'));
    }



    public function addShipping()
    {
	
       $x['bol']  = BillOfLading::read();
       return view('shipping/create',$x);
    }

     public function viewShipping($id)
    {
        $x['id']                         = $id;
        $x['shipping']                   = Shipping::viewShipping($id);
        $x['fetch_shippingDetails']      = Shipping::fetchShippingDetails($id);
        $x['fetch_shippingTotalAmount']  = Shipping::fetchShippingTotalAmount($id);
       return view('shipping/view',$x);
    }

    public function getShipping(Request $x)
    {
        $result = Shipping::getShipping($x);
        return \Response::json($result);
    }

    public function deleteShippingItem( request $request)
    {
        $result = Shipping::deleteShippingItem($request);
        return \Response::json($result);
    }

    public function getShippingItem(Request $x)
    { 
        $result = Shipping::getShippingItem($x);
        return \Response::json($result);
    }

    public function updateShippingItem(Request $x)
    {
        $result = Shipping::updateShippingItem($x);
        return \Response::json($result);
    }

    public function checkIfPlateNumberEnabled(Request $x)
    {
        $result = Fleet::checkIfPlateNumberEnabled($x);
        return \Response::json($result);
    }


    public function getShippingDetails($id)
    {
        $x['id']                         = $id;
        $x['fetch_shipping']             = Shipping::getShipping($id);
        $x['fetch_shippingDetails']      = Shipping::fetchShippingDetails($id);
        $x['fetch_shippingTotalAmount']  = Shipping::fetchShippingTotalAmount($id);
        $x['payee_list']                 = Maintenance::readShippingLine();
        $x['purpose_list']               = Maintenance::readPurpose();
        $x['client_list']                = Maintenance::readClient();
        return view('shipping/update', $x);
    }


    public static function getLiquidationParticulars($id)
    {

        $y = DB::table('liquidation_particulars as lp')
            ->where('lp.liq_id', '=', $id)
            ->select('*')
            ->leftJoin('particular_management as pm', 'pm.id', '=', 'lp.particular_id')
            ->get();
        return $y;


    }
    public function createShipping(Request $x)
    {
           
        $result = Shipping::createShipping($x);
        return \Response::json($result);

        
    }

    public function editShipping(Request $x)
    {
    	$result = Shipping::editShipping($x);
        return \Response::json($result);
    }

    public function releaseShippingForm(Request $x)
    {
        $result = Shipping::releaseShippingForm($x);
        return \Response::json($result);
    }


    public function action(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('bill_of_lading_management as bolm')
                        ->select("*")
                        ->where('bolm.bl_number', 'LIKE','%'.$query.'%')
                        ->where('shipping_status', '=','0')
                        ->get();
        return response()->json($filter_data);

    }


    public function purposeaction(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('purpose_management')
                        ->select("*")
                        ->where('code', 'LIKE', '%'.$query.'%')
                        ->get();
        return response()->json($filter_data);

    }


    public function clientaction(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('client_management')
                        ->select("*")
                        ->where('code', 'LIKE', '%'.$query.'%')
                        
                        ->get();
        return response()->json($filter_data);

    }


    public function pronumaction(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('bill_of_lading_management')
                        ->select("*")
                        ->where('pro_number', 'LIKE', '%'.$query.'%')
                        
                        ->get();
        return response()->json($filter_data);

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


        public function htmlPdf($id)
    {
        
        $x['fetch_shipping']  = Shipping::viewShipping($id);
        $x['fetch_shippingDetails']   = Shipping::fetchShippingDetails($id);
        $x['fetch_shippingTotalAmount']  = Shipping::fetchShippingTotalAmount($id);

        $pdf = PDF::loadView('shipping/shippingPDF',$x);

        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('pdfview.pdf');

    }

}