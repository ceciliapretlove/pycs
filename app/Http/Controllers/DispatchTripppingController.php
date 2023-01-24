<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DispatchTrippping;
use App\Models\Maintenance;
use App\Models\Fleet;
use Connection;
use Validator;
use Response;
use Auth;
use DB;

class DispatchTripppingController extends Controller
{
    public function index()
    {
        $x['operation_list']    = DispatchTrippping::read();
        $x['equipmentType']     = Maintenance::readEquipmentType()->sortBy('et.equipment_category');
        return view('dispatch/index', $x);
    }

    public function filterDispatchBaseOnFilter(Request $x)
    {
        $result = DispatchTrippping::filterDispatchBaseOnFilter($x);
        return \Response::json($result);
    }

    public function createDispatchTrippping(Request $x)
    {
        $x['equipmentCategory'] = Maintenance::readEquipmentCategory();
        $x['equipmentType']     = Maintenance::readEquipmentType();
        $x['locationList']      = Maintenance::readLocation();
        $x['operator']          = Maintenance::readAccount()->where('role', '4');
        return view('dispatch/create', $x);
    }

    public function getEquipmentBaseOnType(Request $x)
    {
        $result = DispatchTrippping::getEquipmentBaseOnType($x);
        return \Response::json($result);
    }
    

    public function createDispatchTrippingOperationsReport(Request $x)
    {
        $result = DispatchTrippping::createDispatchTrippingOperationsReport($x);
        return \Response::json($result);
    }

    public function updateDispatchTrippping($id)
    {
        $x['id']                        = $id;
        $x['equipment_list']            = Fleet::read();
        $x['equipmentCategory']         = Maintenance::readEquipmentCategory();
        $x['equipmentType']             = Maintenance::readEquipmentType();
        $x['locationList']              = Maintenance::readLocation();
        $x['operator']                  = Maintenance::readAccount()->where('role', '4');
        $x['mainOperation']             = DispatchTrippping::readSelectedMain($id);
        $x['secondaryOperation']        = DispatchTrippping::readSelectedSecondary($id);
        return view('dispatch/update', $x);
    }

    public function editDispatchTrippingOperationsReport(Request $x)
    {
        $result = DispatchTrippping::editDispatchTrippingOperationsReport($x);
        return \Response::json($result);
    }
    
    public function viewDispatchTrippping($id)
    {
        $x['id']                        = $id;
        $x['equipment_list']            = Fleet::read();
        $x['equipmentCategory']         = Maintenance::readEquipmentCategory();
        $x['equipmentType']             = Maintenance::readEquipmentType();
        $x['locationList']              = Maintenance::readLocation();
        $x['operator']                  = Maintenance::readAccount()->where('role', '4');
        $x['mainOperation']             = DispatchTrippping::readSelectedMainForViewing($id);
        $x['secondaryOperation']        = DispatchTrippping::readSelectedSecondary($id)->where('activity', '!=', '');
        return view('dispatch/view', $x);
    }

    public function checkDispatchmentTrippingReport(Request $x)
    {
        $result = DispatchTrippping::checkDispatchmentTrippingReport($x);
        return \Response::json($result);
    }

    public function reviewDispatchmentTrippingReport(Request $x)
    {
        $result = DispatchTrippping::reviewDispatchmentTrippingReport($x);
        return \Response::json($result);
    }

    
    /*public function approveDispatchTrip(Request $x)
    {
        $result = DispatchTrippping::approveDispatchTrip($x);
        return \Response::json($result);
    }*/

    // public function rejectDispatchTrip(Request $x)
    // {
    //     $result = DispatchTrippping::rejectDispatchTrip($x);
    //     return \Response::json($result);
    // }

    // public function addDispatchTrip(Request $x)
    // {
    //     $result = DispatchTrippping::addDispatchTrip($x);
    //     return redirect('/dispatchUtilizationTripping');
    // }

    // public function getDispatchTrip(Request $x)
    // {
    //     $result = DispatchTrippping::getDispatchTrip($x);
    //     return \Response::json($result);
    // }

    // public function editDispatchTrip(Request $x)
    // {
       
    //     $result = DispatchTrippping::editDispatchTrip($x);
    //     return \Response::json($result);
    // }

    // public function deleteDispatchTrip(Request $x)
    // {
    //     $result = DispatchTrippping::deleteDispatchTrip($x);
    //     return \Response::json($result);
    // }

    // public function completeLoopCheck($date)
    // {
    //     if($date == null){return false;}else{return true;}
    // }

    // public function completeDispatchTrip(Request $x)
    // {
    //     $result = DispatchTrippping::completeDispatchTrip($x);
    //     return \Response::json($result);
    // }
}