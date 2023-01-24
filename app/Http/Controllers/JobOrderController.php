<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PreventiveMaintenance;
use App\Models\DispatchTrippping;
use App\Models\Maintenance;
use App\Models\JobOrder;
use App\Models\Fleet;
use Connection;
use Validator;
use Response;
use DB;
use DomPDF;
use PDF;

class JobOrderController extends Controller
{
    public function index()
    {
    	$x['joborder']	= JobOrder::read();
        return view('joborder/index', $x);
    }

    public function editJobOrder($id)
    {
    	$x['jo_main']					= JobOrder::getPrimary($id);
    	$x['jo_secondary']				= JobOrder::getSecondary($id);
        $x['reported_by']                   = Maintenance::readAccount();
        $x['inspected_by']                  = Maintenance::readAccount();
        $x['conducted_by']                  = Maintenance::readAccount();
        $x['trial_personnel_by']            = Maintenance::readAccount();
        $x['location']                      = Maintenance::readLocation();
        $x['warehouse_item']                = PreventiveMaintenance::readAllWarehouseItem();
        return view('joborder/update', $x);
    }

    public function updateJobOrder(Request $x)
    {
        $result = JobOrder::updateJobOrder($x);
        return \Response::json($result);
    }

    public function deleteJobOrderItem(Request $x)
    {
        $result = JobOrder::deleteJobOrderItem($x);
        return \Response::json($result);
    }

    public function viewJobOrder($id)
    {
        $x['jo_main']                   = JobOrder::getPrimaryFull($id);
        $x['jo_secondary']              = JobOrder::getSecondaryFull($id);
        return view('joborder/view', $x);
    }

    public function acceptJobOrder(Request $x)
    {
        $result = JobOrder::acceptJobOrder($x);
        return \Response::json($result);
    }

    public function noteJobOrder(Request $x)
    {
        $result = JobOrder::noteJobOrder($x);
        return \Response::json($result);
    }

    public function joborderPDF($id)
    {
        $x['jo_main']   = JobOrder::getJobOrder($id);
        $x['jo_item']   = JobOrder::jobOrderItem($id);
        $pdf = PDF::loadView('joborder/jobOrderPDF',$x);
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('Job_Order.pdf');
    }

    
}