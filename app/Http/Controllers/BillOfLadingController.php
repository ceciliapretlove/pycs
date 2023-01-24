<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\JobOrder;
use App\Models\BillOfLading;
use App\Models\fleet;
use Connection;
use Validator;
use Response;
use DB;

class BillOfLadingController extends Controller
{

    public function index()
    {
       
        $x['bill_of_lading_list']      = BillOfLading::read();
        return view('bill_of_lading/index', $x);

    }



    public function addBillOfLading()
    {
        // $x['pro_number']        = Maintenance::readPRO();
        $x['consignee']         = Maintenance::readConsignee();
        $x['shipper']           = Maintenance::readShipper();
        $x['location']          = Maintenance::readLocation();
        $x['shipping_line']     = Maintenance::readShippingLine();
        $x['port']              = Maintenance::readPort();


        return view('bill_of_lading/create', $x);
    }

    public function getBillOfLading(Request $x)
    {
        $result = BillOfLading::getBillOfLading($x);
        return \Response::json($result);
    }


    public function editBillOfLading($id)
    {
        $x['id']                    = $id;
        $x['fetch_bill_of_lading']  = BillOfLading::fetchBillOfLadingDetails($id);
        $x['fetch_bill_containers'] = BillOfLading::fetchBillContainerDetails($id);
        $x['shipping_line']         = Maintenance::readShippingLine();
        $x['consignee']             = Maintenance::readConsignee();
        $x['shipper']               = Maintenance::readShipper();
        $x['port']                  = Maintenance::readPort();
        // dd($x);
        return view('bill_of_lading/update', $x);
    }

    public function viewBillOfLading($id)
    {
        $x['id']                    = $id;
        $x['fetch_bill_of_lading']  = BillOfLading::fetchBillOfLadingDetails($id);
        $x['fetch_bill_containers'] = BillOfLading::fetchBillContainerDetails($id);
        return view('bill_of_lading/view', $x);
    }

    public function createBillOfLading(Request $x)
    {

        $validatedData = $x->validate([
            'pro_number' => ['required', 'unique:bill_of_lading_management', 'max:255'],
            'bl_number'  => ['required']

        ]);

        $result = BillOfLading::createBillOfLading($x);
        return \Response::json($result);
    }

    public function updateBillOfLading(Request $x)
    {
    	$result = BillOfLading::updateBillOfLading($x);
        return \Response::json($result);
    }

    public function deleteContainer( request $request)
    {
        $result = BillOfLading::deleteContainer($request);
        return \Response::json($result);
    }

    public function getContainer(Request $x)
    { 
        $result = BillOfLading::getContainer($x);
        return \Response::json($result);
    }

    public function updateContainer(Request $x)
    {
        $result = BillOfLading::updateContainer($x);
        return \Response::json($result);
    }

    public function check_pro_num(Request $request)
    {

        if(BillOfLading::where('pro_number','=',$request->input('pro_number'))->exists()){

            return "exist";
        }

        else{                                                                    
            return "not exist";
        }
    }


    //     public function check_pro_num_with_duties(Request $request)
    // {


    //     $withDuties = DB::table('bill_of_lading_management as bolm')
    //     ->select('*','cvc.particular as cvc_particular' )
    //     ->leftJoin('check_voucher as cv', 'bolm.id', '=', 'cv.pro_number')
    //     ->leftJoin('check_voucher_child as cvc', 'cv.id', '=', 'cvc.check_voucher_id')
    //     ->where('bolm.pro_number','=',$request->input('pro_number'));
    //     // ->get();

    //     // return dd($withDuties);

    //     if($withDuties->where('cvc.particular','==','1')->exists()){

    //         return "dutiesandtaxesexist";
    //     }
    //     elseif($withDuties->where('cvc.particular','!=','1')->exists()){

    //         return "exist";
    //     }
    //     else{                                                                    
    //         return "not exist";
    //     }
    // }

        public function check_unused_pro_num(Request $request)
    {

        
            if(BillOfLading::where('pro_number','=',$request->input('pro_number'))->orWhere('checkvoucher_status','=',$request->input('checkvoucher_status'))->exists()){
                            return "exist";
            }
            // elseif(BillOfLading::where('pro_number','=',$request->input('pro_number'))->orWhere('checkvoucher_status','=','1')->exists()){
            //     return "existbutstatus1";
            // }
        else{                                                                    
            return "not exist";
        }
    }

    public function check_bl_num(Request $request)
    {

        if(BillOfLading::where('bl_number','=',$request->input('bl_number'))->exists()){

            return "exist";
        }

        else{                                                                    
            return "not exist";
        }
    }

}