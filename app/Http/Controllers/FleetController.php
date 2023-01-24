<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\JobOrder;
use App\Models\Fleet;
use Connection;
use Validator;
use Response;
use DB;

class FleetController extends Controller
{

    public function index()
    {
        $x['equipment_list']    = Fleet::read();
        $x['equipmentType']     = Maintenance::readEquipmentType()->sortBy('et.equipment_category');
        return view('equipment/index', $x);
    }

    public function filterEquipmentListOnView(Request $x)
    {
        $result = Fleet::filterEquipmentListOnView($x);
        return \Response::json($result);
    }

    public function addEquipmentRegister()
    {
        $x['equipmentCategory'] = Maintenance::readEquipmentCategory();
        $x['equipmentType']     = Maintenance::readEquipmentType();
        return view('equipment/create', $x);
    }

    public function getEquipmentTypeBaseOnCategory(Request $x)
    {
        $result = Fleet::getEquipmentTypeBaseOnCategory($x);
        return \Response::json($result);
    }

    public function checkIfPlateNumberEnabled(Request $x)
    {
        $result = Fleet::checkIfPlateNumberEnabled($x);
        return \Response::json($result);
    }

    public function updateEquipmentRegister($id)
    {
        $x['id']                    = $id;
        $x['fetch_equipment']       = Fleet::fetchEquipmentDetails($id);
        $x['equipmentCategory']     = Maintenance::readEquipmentCategory();
        $x['equipmentType']         = Maintenance::readEquipmentType();
        return view('equipment/update', $x);
    }

    public function createEquipmentRegistration(Request $x)
    {
        $result = Fleet::createEquipmentRegistration($x);
        return \Response::json($result);
    }

    public function editEquipmentRegister(Request $x)
    {
    	$result = Fleet::editEquipmentRegister($x);
        return \Response::json($result);
    }

}