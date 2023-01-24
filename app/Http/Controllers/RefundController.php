<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Liquidation;
use App\Models\BillOfLading;
use App\Models\Refund;
use Connection;
use Validator;
use Response;
use DB;

class RefundController extends Controller
{

    public function index()
    {
       
        $x['refund_list']  = Refund::readRefund();
        $x['total_deduction']  = Refund::readTotalDeduction();
        $x['total_refunded']  = Refund::readTotalRefunded();
        $x['total_refund']  = Refund::readTotalForRefund();
        $x['total_container_deposit']  = Refund::readTotalContainerDeposit();
        $x['refund_pagination'] = Refund::readRefundPagination();
        return view('refund/index',$x);

    }

    public function addRefund()
    {

       $x['bol']  = BillOfLading::read();
       return view('refund/create',$x);
    }

    public function createRefund(Request $x)
    {
        $validatedData = $x->validate([
                'pro_number' => ['required', 'unique:refund_management', 'max:255'],
            ]);
       $result = Refund::createRefund($x);
        return \Response::json($result);
    }

     public function getRefund($id)
    {
      $x['id']           = $id;
      $x['fetch_refund']  = Refund::getRefund($id);
      $x['fetch_refund_checks']  = Refund::getRefundChecks($id);
       return view('refund/update',$x);
    }

        public function editrefund(Request $x)
    {
        $result = Refund::editRefund($x); 
        return \Response::json($result);
    }

    public function action(Request $request)
    {

        $data = $request->all();

        $query = $data['query'];

        $filter_data = DB::table('bill_of_lading_management as bolm')
                        ->select(
                            'bolm.id as id',
                            'bolm.pro_number as pro_number',
                            'bolm.bl_number',
                            'ca.received_amount as cash_advance',
                            'ca.status as ca_status',
                        )

                        ->leftJoin('cash_advance as ca', 'ca.bill_id', '=', 'bolm.id')
                        ->leftJoin('check_request_form as crf', 'crf.job_file_id', '=', 'bolm.id')
                        ->where('bolm.pro_number', 'LIKE', ''.$query.'%')
                         ->where('refund_status', '=','0')
                        ->get();
        return response()->json($filter_data);

    }

        public function emptyReturnIndex(Request $x)
    {
        $x['empty_return'] = Refund::readEmptyReturnList();
        // $x['empty_pagination'] = Refund::readEmptyReturnPagination();
        return view('emptyReturn/index',$x);

    }

    public function getEmptyReturn($id)
    {
        $x['id']                    = $id;
        $x['empty_return']          = Refund::BillOfLadingDetails($id);
        $x['fetch_bill_containers'] = BillOfLading::fetchBillContainerDetails($id);
        $x['shipping_line']         = Maintenance::readShippingLine();
        $x['consignee']             = Maintenance::readConsignee();
        $x['shipper']               = Maintenance::readShipper();
        $x['port']                  = Maintenance::readPort();
       return view('emptyReturn/update',$x);
    }

    
    public function updateEmptyReturn(Request $x)
    {
        $result = Refund::updateEmptyReturn($x);
        return \Response::json($result);
    }

    public function viewRefund($id)
    {
      $x['id']                   = $id;
      $x['fetch_refund']         = Refund::getRefund($id);
      // $x['fetch_refund_checks']  = Refund::getRefundChecks($id);
       return view('refund/view',$x);
    }


    public function viewEmptyReturn($id)
    {
      // $x['id'] = $id;
      // $x['empty_return'] = Refund::readEmptyReturn($id);

        $x['id']                    = $id;
        $x['empty_return']          = Refund::BillOfLadingDetails($id);
        $x['fetch_bill_containers'] = BillOfLading::fetchBillContainerDetails($id);
        $x['shipping_line']         = Maintenance::readShippingLine();
        $x['consignee']             = Maintenance::readConsignee();
        $x['shipper']               = Maintenance::readShipper();
        $x['port']                  = Maintenance::readPort();
       return view('emptyReturn/view',$x);
    }
}