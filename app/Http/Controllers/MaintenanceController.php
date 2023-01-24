<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Maintenance;
use Connection;
use Validator;
use Response;
use DB;

class MaintenanceController extends Controller
{

    public function getNotificationBaseOnRole()
    {
        $result = Maintenance::getNotificationBaseOnRole(); 
        return \Response::json($result);
    }

    public function getOldNotifications()
    {
        $result = Maintenance::getOldNotifications(); 
        return \Response::json($result);
    }

// Role
    public function createRole(Request $x)
    {
        $result = Maintenance::createRole($x); 
        return \Response::json($result);
    }

        public function Role()
    {
        $x['role'] = Maintenance::readRole();
        return view('maintenance/role',$x);
    }

        public function getRole(Request $x)
    {
       
        $result = Maintenance::getRole($x);
        return \Response::json($result);
    }


        public function editRole(Request $x)
    {
       
        $result = Maintenance::editRole($x);
        return \Response::json($result);
    }

    // Account
    public function createAccount(Request $x)
    {
        $result = Maintenance::createAccount($x); 
        return \Response::json($result);
    }

    public function getRoleInformation(Request $x)
    {
        $result = Maintenance::getRoleInformation($x); 
        return \Response::json($result);
    }

    public function accountManagement()
    {
        $x['role']              = Maintenance::readRole();
        $x['account']           = Maintenance::readAccount();
        $x['role_edit']         = Maintenance::readRole();
        return view('maintenance/account',$x);
    }

    public function getAccount(Request $x)
    {
       
        $result = Maintenance::getAccount($x);
        return \Response::json($result);
    }


    public function editAccount(Request $x)
    {
       
        $result = Maintenance::editAccount($x);
        return \Response::json($result);
    }
    public function deactivateAccount(Request $x)
    {
       
        $result = Maintenance::deactivateAccount($x);
        return \Response::json($result);
    }

    public function activateAccount(Request $x)
    {
       
        $result = Maintenance::activateAccount($x);
        return \Response::json($result);
    }

        // Fleet Type    
    public function createEquipmentCategory(Request $x)
    {
        $result = Maintenance::createEquipmentCategory($x); 
        return \Response::json($result);
    }

    public function equipmentCategory()
    {
        $x['equipmentCategory'] = Maintenance::readEquipmentCategory();
        return view('maintenance/equipment_category',$x);
    }

    public function getEquipmentCategory(Request $x)
    {
       
        $result = Maintenance::getEquipmentCategory($x);
        return \Response::json($result);
    }


    public function editEquipmentCategory(Request $x)
    {
       
        $result = Maintenance::editEquipmentCategory($x);
        return \Response::json($result);
    }


    public function deactivateEquipmentCategory(Request $x)
    {
       
        $result = Maintenance::deactivateEquipmentCategory($x);
        return \Response::json($result);
    }

    public function activateEquipmentCategory(Request $x)
    {
       
        $result = Maintenance::activateEquipmentCategory($x);
        return \Response::json($result);
    }



// Location
    public function createLocation(Request $x)
    {
        $result = Maintenance::createLocation($x); 
        return \Response::json($result);
    }

        public function location()
    {
        $x['location'] = Maintenance::readLocation();
        return view('maintenance/location',$x);
    }

        public function getLocation(Request $x)
    {
       
        $result = Maintenance::getLocation($x);
        return \Response::json($result);
    }


        public function editLocation(Request $x)
    {
       
        $result = Maintenance::editLocation($x);
        return \Response::json($result);
    }


    //Preventive Maintenance
    public function createPmsType(Request $x)
    {
        $result = Maintenance::createPmsType($x);
        return \Response::json($result); 
    }
    public function pms()
    {
        $x['pms_var']       = Maintenance::readPMSVar();
        $x['warehouse']     = Maintenance::readWarehouseInventory();
        $x['pms_item']      = Maintenance::readPmstypeItems();

        $x['ph']            = Maintenance::readPMSBaseOnMainVar(1);
        $x['pkm']           = Maintenance::readPMSBaseOnMainVar(2);
        $x['sd']            = Maintenance::readPMSBaseOnMainVar(3);
        return view('maintenance/pms',$x);
    }
    public function getPmsType(Request $x)
    {
        $result = Maintenance::getPmsType($x);
        return \Response::json($result);
    }
    public function editPmsType(Request $x)
    {
        $result = Maintenance::editPmsType($x);
        return \Response::json($result);
    }
    public function pmsItem($id)
    {
        $x['id']        = $id;
        $a['pms']       = Maintenance::getPmsType($x);
        $x['pms_item']  = Maintenance::readPmstypeItemsType($x);
        $a['warehouse'] = Maintenance::readWarehouseInventory();
        return view('maintenance/pms_type_item', $a, $x);
    }

    public function getPmsItem(Request $x)
    {
        $result = Maintenance::getPmsItem($x);
        return \Response::json($result);
    }
    public function editPMSItem(Request $x)
    {
       
        $result = Maintenance::editPMSItem($x);
        return \Response::json($result);
    }
    public function pmsItemAdd(Request $x)
    {
        $result = Maintenance::pmsItemAdd($x);
        return redirect('/pms');
    }
    
    public function deletePmsItem( request $request)
    {
        $result = Maintenance::deletePmsItem($request);
        return \Response::json($result);
    }
    public function warehouseInventory()
    {
        $x['warehouse']     = Maintenance::readWarehouseInventory();
        $x['location']      = Maintenance::readLocation();
        return view('maintenance/warehouse_inventory', $x);
    }

    public function createWarehouseInventory(Request $x)
    {
        $result = Maintenance::createWarehouseInventory($x);
        return \Response::json($result); 
    }

    public function getWarehouseInventory(Request $x)
    {
        $result = Maintenance::getWarehouseInventory($x);
        return \Response::json($result); 
    }

    public function editWarehouseInventory(Request $x)
    {
       
        $result = Maintenance::editWarehouseInventory($x);
        return \Response::json($result);
    }

    public function deactivateWarehouseInventory(Request $x)
    {
        $result = Maintenance::deactivateWarehouseInventory($x);
        return \Response::json($result);
    }

    public function activateWarehouseInventory(Request $x)
    {
        $result = Maintenance::activateWarehouseInventory($x);
        return \Response::json($result);
    }

    // Equipment Type    
    public function equipmentType()
    {
        $x['equipmentCategory'] = Maintenance::readEquipmentCategory();
        $x['equipmentType']     = Maintenance::readEquipmentType();
        return view('maintenance/equipment_type', $x);
    }

    public function createEquipmentType(Request $x)
    {
        $result = Maintenance::createEquipmentType($x); 
        return \Response::json($result);
    }

    public function getEquipmentType(Request $x)
    {
       
        $result = Maintenance::getEquipmentType($x);
        return \Response::json($result);
    }


    public function editEquipmentType(Request $x)
    {
       
        $result = Maintenance::editEquipmentType($x);
        return \Response::json($result);
    }


    public function deactivateEquipmentType(Request $x)
    {
       
        $result = Maintenance::deactivateEquipmentType($x);
        return \Response::json($result);
    }

    public function activateEquipmentType(Request $x)
    {
       
        $result = Maintenance::activateEquipmentType($x);
        return \Response::json($result);
    }

    // Approval
    public function createApproval(Request $x)
    {
        $result = Maintenance::createApproval($x); 
        return \Response::json($result);
    }

        public function approval()
    {
        $x['approval_type'] = Maintenance::readApproval();
        return view('maintenance/approval',$x);
    }

        public function getApproval(Request $x)
    {
       
        $result = Maintenance::getApproval($x);
        return \Response::json($result);
    }


        public function editApproval(Request $x)
    {
       
        $result = Maintenance::editApproval($x);
        return \Response::json($result);
    }

        public function deactivateApproval(Request $x)
    {
       
        $result = Maintenance::deactivateApproval($x);
        return \Response::json($result);
    }

    public function activateApproval(Request $x)
    {
       
        $result = Maintenance::activateApproval($x);
        return \Response::json($result);
    }

// Rate
    public function createRate(Request $x)
    {
        $result = Maintenance::createRate($x); 
        return \Response::json($result);
    }

        public function rate()
    {
        $x['rate'] = Maintenance::readRate();
        $x['location'] = Maintenance::readLocation();
        $x['role_location'] = Maintenance::readLocation();
        return view('maintenance/rate',$x);
    }

        public function getRate(Request $x)
    {
       
        $result = Maintenance::getRate($x);
        return \Response::json($result);
    }


        public function editRate(Request $x)
    {
       
        $result = Maintenance::editRate($x);
        return \Response::json($result);
    }

// Port
    public function createPort(Request $x)
    {
        $result = Maintenance::createPort($x); 
        return \Response::json($result);
    }

        public function port()
    {
        $x['port'] = Maintenance::readPort();
        return view('maintenance/port',$x);
    }

        public function getPort(Request $x)
    {
       
        $result = Maintenance::getPort($x);
        return \Response::json($result);
    }


        public function editPort(Request $x)
    {
       
        $result = Maintenance::editPort($x);
        return \Response::json($result);
    }



    // Shipper
    public function createShipper(Request $x)
    {
        $result = Maintenance::createShipper($x); 
        return \Response::json($result);
    }

        public function shipper()
    {
        $x['shipper'] = Maintenance::readShipper();
        return view('maintenance/shipper',$x);
    }

        public function getShipper(Request $x)
    {
       
        $result = Maintenance::getShipper($x);
        return \Response::json($result);
    }


        public function editShipper(Request $x)
    {
       
        $result = Maintenance::editShipper($x);
        return \Response::json($result);
    }


    // Consignee
    public function createConsignee(Request $x)
    {
        $result = Maintenance::createConsignee($x); 
        return \Response::json($result);
    }

        public function consignee()
    {
        $x['consignee'] = Maintenance::readConsignee();
        return view('maintenance/consignee',$x);
    }

        public function getConsignee(Request $x)
    {
       
        $result = Maintenance::getConsignee($x);
        return \Response::json($result);
    }


        public function editConsignee(Request $x)
    {
       
        $result = Maintenance::editConsignee($x);
        return \Response::json($result);
    }


    // Particular
    public function createParticular(Request $x)
    {
        $result = Maintenance::createParticular($x); 
        return \Response::json($result);
    }

        public function Particular()
    {
        $x['particular'] = Maintenance::readParticular();
        return view('maintenance/particular',$x);
    }

        public function getMaintParticular(Request $x)
    {
       
        $result = Maintenance::getMaintParticular($x);
        return \Response::json($result);
    }


        public function editParticular(Request $x)
    {
       
        $result = Maintenance::editParticular($x);
        return \Response::json($result);
    }

    

    // Purpose
    public function createPurpose(Request $x)
    {
        $result = Maintenance::createPurpose($x); 
        return \Response::json($result);
    }

        public function purpose()
    {
        $x['purpose'] = Maintenance::readPurpose();
        return view('maintenance/purpose',$x);
    }

        public function getPurpose(Request $x)
    {
       
        $result = Maintenance::getPurpose($x);
        return \Response::json($result);
    }


        public function editPurpose(Request $x)
    {
       
        $result = Maintenance::editPurpose($x);
        return \Response::json($result);
    }

    public function check_purpose(Request $request)
    {
        if(DB::table('purpose_management')->where('code',$request->input('code'))->exists()){
            
            return "exist";
        }

        else{                                                                    
            return "not exist";
        }
    }

    // Client
    public function createClient(Request $x)
    {
        $result = Maintenance::createClient($x); 
        return \Response::json($result);
    }

        public function Client()
    {
        $x['client'] = Maintenance::readClient();
        return view('maintenance/client',$x);
    }

        public function getClient(Request $x)
    {
       
        $result = Maintenance::getClient($x);
        return \Response::json($result);
    }


        public function editClient(Request $x)
    {
       
        $result = Maintenance::editClient($x);
        return \Response::json($result);
    }
    
    //Shipping Line
    public function createShippingLine(Request $x)
    {
        $result = Maintenance::createShippingLine($x); 
        return \Response::json($result);
    }

    public function ShippingLineManagement()
    {
        $x['shipping_line'] = Maintenance::readShippingLine();
        return view('maintenance/shipping_line', $x);
    }

    public function getShippingLine(Request $x)
    {
       
        $result = Maintenance::getShippingLine($x);
        return \Response::json($result);
    }


    public function editShippingLine(Request $x)
    {
       
        $result = Maintenance::editShippingLine($x);
        return \Response::json($result);
    }

    //Check Type
    public function createCheckType(Request $x)
    {
        $result = Maintenance::createCheckType($x); 
        return \Response::json($result);
    }

    public function CheckType()
    {
        $x['check_type'] = Maintenance::readCheckType();
        return view('maintenance/check_type', $x);
    }

    public function getCheckType(Request $x)
    {
       
        $result = Maintenance::getCheckType($x);
        return \Response::json($result);
    }


    public function editCheckType(Request $x)
    {
       
        $result = Maintenance::editCheckType($x);
        return \Response::json($result);
    }

    public function check_c_type(Request $request)
    {
        if(DB::table('check_type_management')->where('code',$request->input('code'))->exists()){
            
            return "exist";
        }

        else{                                                                    
            return "not exist";
        }
    }
    
    //Trailer

    public function createTrailerSize(Request $x)
    {
        $result = Maintenance::createTrailerSize($x); 
        return \Response::json($result);
    }

    public function trailerSizes()
    {
        $x['trailerSizes'] = Maintenance::readTrailerSize();
        return view('maintenance/trailer-sizes',$x);
    }

    public function getTrailerSize(Request $x)
    {
       
        $result = Maintenance::getTrailerSize($x);
        return \Response::json($result);
    }


    public function editTrailerSize(Request $x)
    {
       
        $result = Maintenance::editTrailerSize($x);
        return \Response::json($result);
    }


    public function deactivateTrailerSize(Request $x)
    {
       
        $result = Maintenance::deactivateTrailerSize($x);
        return \Response::json($result);
    }

    public function activateTrailerSize(Request $x)
    {
       
        $result = Maintenance::activateTrailerSize($x);
        return \Response::json($result);
    }
}


