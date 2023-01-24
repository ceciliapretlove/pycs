<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Validator;
use Response;
use Auth;
use DB;

class Maintenance extends Model
{
    protected $table = 'purpose_management';
    
    public static function getNotificationBaseOnRole()
    {
        if(auth()->user()->approver == 1)
            $y = DB::table('notification as notif')
                ->where('notif.status', '=', 'Pending')
                ->leftJoin('users as u', 'u.id', '=', 'notif.requested_by')
                ->select(
                    'notif.id',
                    'notif.module',
                    'notif.module_id',
                    'notif.url',
                    'notif.requested_action',
                    'notif.requested_at',
                    'notif.tag',
                    'u.fname',
                    'u.lname'
                )
                ->get();
        else{
            $y = '';
        }
        return $y;
    }

    public static function getOldNotifications()
    {
        $y = DB::table('notification as notif')
            ->where('notif.status', '=', 'Completed')
            ->leftJoin('users as u', 'u.id', '=', 'notif.requested_by')
            ->select(
                'notif.id',
                'notif.module',
                'notif.module_id',
                'notif.url',
                'notif.requested_action',
                'notif.requested_at',
                'notif.tag',
                'u.fname',
                'u.lname'
            )
            ->orderBy('id', 'desc')
            ->limit('7')
            ->get();
        return $y;
    }

// Role
    public static function createRole($x)
    {
        $y = DB::table('roles')
            ->insert(
                array(
                    'title'         => $x['title'],
                    'approver'      => $x['approver'],
                    'created_by'    => auth::user()->id,
                    'created_at'    => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

        public static function readRole()
    {
        $y = DB::table('roles')
            ->select('*')
            ->get();
        return $y;
    }

        public static function getRole($x)
    {
        $result = DB::table('roles')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();

        return $result;
    }

        public static function editRole($x)
    {
        $result = DB::table('roles')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'title'         => $x['title'],
                    'approver'      => $x['approver'],
                    'updated_by'    => auth::user()->id,
                    'updated_at'    => date("Y-m-d H:i:s")
                )
            );

        if($result == true){
            $u = DB::table('users')
                ->where('role', '=', $x['id'])
                ->update(
                    array(
                        'approver' => $x['approver'],
                    )
                );
        }
        return $result;
    }

    public static function getRoleInformation($x)
    {
        $result = DB::table('roles')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function createAccount($x)
    {
        $password                       = Hash::make($x['password']);
        $y = DB::table('users')
            ->insert(
                array(
                    'fname'             => $x['fname'],
                    'mname'             => $x['mname'],
                    'lname'             => $x['lname'],
                    'email'             => $x['email'],
                    'job'               => $x['job'],
                    'role'              => $x['role'],
                    'password'          => $password,
                    'approver'          => $x['approver'],
                    'status'            => 0,
                    'created_by'        => auth::user()->id,
                    'created_at'        => date("Y-m-d H:i:s")
                )
            );
        return $y;
    }

        public static function readAccount()
    {
        $y = DB::table('users as u')
            ->select(
                'u.id',
                'u.fname',
                'u.mname',
                'u.lname',
                'u.email',
                'u.job',
                'u.role',
                'u.approver',
                'u.status',
                'r.title'
            )
            ->leftJoin('roles as r', 'r.id', '=', 'u.role')
            ->get();
        return $y;
    }

        public static function getAccount($x)
    {
        $result = DB::table('users')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editAccount($x)
    {
        if( isset($x['edit_password']) && !empty($x['edit_password']) ){
            $password                       = Hash::make($x['edit_password']);
            $result = DB::table('users')
                ->where('id', '=', $x['id'])
                ->update(
                    array(
                        'fname'             => $x['edit_fname'],
                        'mname'             => $x['edit_mname'],
                        'lname'             => $x['edit_lname'],
                        'email'             => $x['edit_email'],
                        'job'               => $x['edit_job'],
                        'role'              => $x['edit_role'],
                        'password'          => $password,
                        'approver'          => $x['edit_approver'],
                        'status'            => 0,
                        'updated_by'        => auth::user()->id,
                        'updated_at'        => date("Y-m-d H:i:s")
                    )
                );
        }else{
            $result = DB::table('users')
                ->where('id', '=', $x['id'])
                ->update(
                    array(
                        'fname'             => $x['edit_fname'],
                        'mname'             => $x['edit_mname'],
                        'lname'             => $x['edit_lname'],
                        'email'             => $x['edit_email'],
                        'job'               => $x['edit_job'],
                        'role'              => $x['edit_role'],
                        'approver'          => $x['edit_approver'],
                        'status'            => 0,
                        'updated_by'        => auth::user()->id,
                        'updated_at'        => date("Y-m-d H:i:s")
                    )
                );
        }
        return $result;
    }


        public static function activateAccount( $x )
    {
        $result = DB::table('users')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 0
                )
            );
    }
        public static function deactivateAccount($x)
    {
        $result = DB::table('users')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 1
                )
            );
}

// EquipmentCategory
    public static function createEquipmentCategory($x)
    {
        $y = DB::table('equipment_category')
            ->insert(
                array(
                    'type'             => $x['type'],
                    'plate_number'     => $x['plate_number'],
                    'status'           => 0,
                    'created_by'       => auth::user()->id,
                    'created_at'       => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readEquipmentCategory()
    {
        $y = DB::table('equipment_category')
            ->select('*')
            ->get();
        return $y;
    }

    public static function getEquipmentCategory($x)
    {
        $result = DB::table('equipment_category')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();

        return $result;
    }

    public static function editEquipmentCategory($x)
    {
        $result = DB::table('equipment_category')
            ->where('id', '=', $x['id'])
            ->update(
                array(

                    'type'             => $x['edit_type'],
                    'plate_number'     => $x['edit_plate_number'],
                    'status'           => 0,
                    'updated_by'    => auth::user()->id,
                    'updated_at'    => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }


    public static function activateEquipmentCategory( $x )
    {
        $result = DB::table('equipment_category')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 0
                )
            );
    }
    public static function deactivateEquipmentCategory($x)
    {
        $result = DB::table('equipment_category')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 1
                )
            );
    }

    public static function readPMSBaseOnMainVar($x)
    {
        $y = DB::table('pms_type as pt')
            ->where('pt.pms_main_var', '=', $x)
            ->select(
                'pt.id',
                'pt.pms_milestone',
                'pmv.pms_main'
            )
            ->leftJoin('pms_main_var as pmv', 'pmv.id', '=', 'pt.pms_main_var')
            ->get();
        return $y;
    }

    public static function createPmsType($x)
    {
        $y = DB::table('pms_type')
            ->insert(
                array(
                    'pms_main_var'      => $x['pms_main_var'],
                    'pms_milestone'     => $x['pms_milestone'],
                    'created_by'        => auth::user()->id,
                    'created_at'        => date("Y-m-d H:i:s")
                )
            );
        return $y;
    }

    //PMSItem
    public static function deletePmsItem( $x )
    {
        $result = DB::table('pms_type_item')
            ->where('id', '=', $x['id'])
            ->delete();
        return $result;
    }

    public static function getPmsItem($x)
    {

        $result = DB::table('pms_type_item')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();

        return $result;
    }

    public static function editPMSItem($x)
    {
        $result = DB::table('pms_type_item')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'warehouse_item' => $x['warehouse_item'],
                    'amount'         => $x['amount'],
                    'remarks'        => $x['remarks'],
                    'updated_by'     => auth::user()->id,
                    'updated_at'     => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }
    // Location
 public static function createLocation($x)
    {
        $y = DB::table('location')
            ->insert(
                array(
                    'location'      => $x['location'],
                    'created_by'    => auth::user()->id,
                    'created_at'    => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

        public static function readLocation()
    {
        $y = DB::table('location')
            ->select('*')
            ->orderBy('location', 'asc')
            ->get();
        return $y;
    }

        public static function getLocation($x)
    {
        $result = DB::table('location')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();

        return $result;
    }

        public static function editLocation($x)
    {
        $result = DB::table('location')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'location'      => $x['location'],
                    'updated_by'    => auth::user()->id,
                    'updated_at'    => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }

    public static function readPMSVar()
    {
        $result = DB::table('pms_main_var')
            ->where('status', '=', '0')
            ->get();
        return $result;
    }

    public static function getPmsType($x)
    {
        $y = DB::table('pms_type as pt')
            ->where('pt.id', '=', $x['id'])
            ->select(
                'pt.id',
                'pt.pms_milestone',
                'pmv.pms_main'
            )
            ->leftJoin('pms_main_var as pmv', 'pmv.id', '=', 'pt.pms_main_var')
            ->get();
        return $y;
    }

    public static function editPmsType($x)
    {
        $result = DB::table('pms_type')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'pms_main_var'  => $x['pms_type'],
                    'updated_by'    => auth::user()->id,
                    'updated_at'    => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }
    public static function readPmstypeItemsType($x)
    {
        $y = DB::table('pms_type_item as pti')
            ->select(
                'pti.id',
                'pti.pms_id',
                'wi.item_id',
                'wi.serial_id',
                'wi.item_name',
                'pti.amount'
            )
            ->where('pms_id', '=', $x['id'])
            ->leftJoin('warehouse_inventory as wi', 'wi.id', '=', 'pti.warehouse_item')
            ->get();
        return $y;
    }
    public static function readPmstypeItems()
    {
        $y = DB::table('pms_type_item as pti')
            ->select(
                'pti.pms_id',
                'wi.item_id',
                'wi.serial_id',
                'wi.item_name',
                'pti.amount'
            )
            ->leftJoin('warehouse_inventory as wi', 'wi.id', '=', 'pti.warehouse_item')
            ->get();
        return $y;
    }

    public static function pmsItemAdd($y)
    {
        foreach($y['warehouse_item'] as $key => $value) {
            DB::table('pms_type_item')
                ->insert(
                    array(
                        'pms_id'                => $y['pms_id'],
                        'warehouse_item'        => $y['warehouse_item'][$key],
                        'amount'                => $y['amount'][$key],
                        'remarks'               => $y['remarks'][$key]
                    )
                );
        }
    }


    


    public static function readWarehouseInventory()
    {
        $y = DB::table('warehouse_inventory as wi')
            ->select(
                'wi.id',
                'wi.item_id',
                'wi.serial_id',
                'wi.item_name',
                'wi.brand',
                'wi.conditions',
                'wi.location as location_id',
                'wi.qty',
                'wi.moving_qty',
                'wi.unit',
                'wi.purchased_price',
                'wi.status',
                'loc.location'
            )
            ->orderBy('wi.item_id', 'asc')
            ->leftJoin('location as loc', 'loc.id', '=', 'wi.location')
            ->get();
        return $y;
    }

    public static function createWarehouseInventory($x)
    {
        $y = DB::table('warehouse_inventory')
            ->insert(
                array(
                    'item_id'           => $x['item'],
                    'serial_id'         => $x['serial'],
                    'item_name'         => $x['item_name'],
                    'brand'             => $x['brand'],
                    'conditions'        => $x['condition'],
                    'location'          => $x['location'],
                    'qty'               => $x['qty'],
                    'moving_qty'        => $x['qty'],
                    'unit'              => $x['unit'],
                    'purchased_price'   => $x['purchased_price'],
                    'status'            => 0,
                    'created_by'        => auth::user()->id,
                    'created_at'        => date("Y-m-d H:i:s")
                )
            );
        return $y;
    }

    public static function getWarehouseInventory($x)
    {
        $result = DB::table('warehouse_inventory')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();

        return $result;
    }

     public static function editWarehouseInventory($x)
    {
        $result = DB::table('warehouse_inventory')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'item_id'           => $x['edit_item'],
                    'serial_id'         => $x['edit_serial'],
                    'item_name'         => $x['edit_item_name'],
                    'brand'             => $x['edit_brand'],
                    'conditions'        => $x['edit_condition'],
                    'purchased_price'   => $x['edit_purchased_price'],
                    'location'          => $x['edit_location'],
                    'qty'               => $x['edit_qty'],
                    'moving_qty'        => $x['edit_qty'],
                    'unit'              => $x['edit_unit'],
                    'updated_by'        => auth::user()->id,
                    'updated_at'        => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }

    public static function deactivateWarehouseInventory($x)
    {
        $result = DB::table('warehouse_inventory')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 1
                )
            );
        return $result;
    }

    public static function activateWarehouseInventory($x)
    {
        $result = DB::table('warehouse_inventory')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 0
                )
            );
        return $result;
    }

    // Equipment Type
    public static function readEquipmentType()
    {
        $result = DB::table('equipment_type as et')
            ->leftJoin('equipment_category as ec', 'ec.id', '=', 'et.equipment_category')
            ->select(
                'et.id',
                'et.equipment_type',
                'et.equipment_category',
                'ec.type as equipment_category_name',
                'ec.plate_number',
                'et.status'
            )
            ->get();
        return $result;
    }

    public static function createEquipmentType($x)
    {
        $y = DB::table('equipment_type')
            ->insert(
                array(
                    'equipment_category'            => $x['equipment_category'],
                    'equipment_type'                => $x['equipment_type'],
                    'status'                        => 0,
                    'created_by'                    => auth::user()->id,
                    'created_at'                    => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function getEquipmentType($x)
    {
        $result = DB::table('equipment_type')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editEquipmentType($x)
    {
        $result = DB::table('equipment_type')
            ->where('id', '=', $x['id'])
            ->update(
                array(

                    'equipment_category'            => $x['edit_equipment_category'],
                    'equipment_type'                => $x['edit_equipment_type'],
                    'status'                        => $x['edit_status'],
                    'updated_by'                    => auth::user()->id,
                    'updated_at'                    => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }


    public static function activateEquipmentType( $x )
    {
        $result = DB::table('equipment_type')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 0
                )
            );
    }
    public static function deactivateEquipmentType($x)
    {
        $result = DB::table('equipment_type')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 1
                )
            );
    }

// Approval Managment
        public static function createApproval($x)
    {
        $y = DB::table('approval_management')
            ->insert(
                array(
                    'approval_type' => $x['approval_type'],
                    'status'        => 0,
                    'created_by'    => auth::user()->id,
                    'created_at'    => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readApproval()
    {
        $y = DB::table('approval_management')
            ->select('*')
            ->get();
        return $y;
    }

    public static function getApproval($x)
    {
        $result = DB::table('approval_management')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editApproval($x)
    {
        $result = DB::table('approval_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(

                    'approval_type'  => $x['approval_type'],
                    'updated_by'     => auth::user()->id,
                    'updated_at'     => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }

    public static function activateApproval( $x )
    {
        $result = DB::table('approval_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 0
                )
            );
    }
    
    public static function deactivateApproval($x)
    {
        $result = DB::table('approval_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'status' => 1
                )
            );
    }

    // Rate Managment
        public static function createRate($x)
    {
        $y = DB::table('rate_management')
            ->insert(
                array(
                    'rate' => $x['rate'],
                    'destination' => $x['destination'],
                    'status'        => 0,
                    'created_by'    => auth::user()->id,
                    'created_at'    => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readRate()
    {
        $y = DB::table('rate_management as rt')
            ->leftJoin('location as l', 'l.id', '=', 'rt.destination')
            ->select(
                'rt.id',
                'rt.rate',
                'rt.destination',
                'l.location'
            )
            ->get();
        return $y;
    }

    public static function getRate($x)
    {
        $result = DB::table('rate_management')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();

        return $result;
    }

    public static function editRate($x)
    {
        $result = DB::table('rate_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(

                    'rate'  => $x['rate'],
                    'destination'  => $x['destination'],
                    'updated_by'     => auth::user()->id,
                    'updated_at'     => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }

        // Port Managment
        public static function createPort($x)
    {
        $y = DB::table('port_management')
            ->insert(
                array(
                    'port' => $x['port'],
                    'status'        => 0,
                    'created_by'    => auth::user()->id,
                    'created_at'    => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readPort()
    {
        $y = DB::table('port_management')
            ->select('*')
            ->get();
        return $y;
    }

    public static function getPort($x)
    {
        $result = DB::table('port_management')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editPort($x)
    {
        $result = DB::table('port_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(

                    'port'           => $x['edit_port'],
                    'updated_by'     => auth::user()->id,
                    'updated_at'     => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }
  
    // Shipper Managment
        public static function createShipper($x)
    {
        $y = DB::table('shipper_management')
            ->insert(
                array(
                    'shipper'           => $x['shipper'],
                    'shipper_address'   => $x['shipper_address'],
                    'created_by'        => auth::user()->id,
                    'created_at'        => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readShipper()
    {
        $y = DB::table('shipper_management')
            ->select('*')
            ->get();
        return $y;
    }

    public static function getShipper($x)
    {
        $result = DB::table('shipper_management')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editShipper($x)
    {
        $result = DB::table('shipper_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(

                    'shipper'           => $x['edit_shipper'],
                    'shipper_address'   => $x['edit_shipper_address'],
                    'updated_by'        => auth::user()->id,
                    'updated_at'        => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }

    // Shipping Line Managment
        public static function createShippingLine($x)
    {
        $y = DB::table('shipping_line_management')
            ->insert(
                array(
                    'shipping_line'           => $x['shipping_line'],
                    'shipping_line_address'   => $x['shipping_line_address'],
                    'created_by'              => auth::user()->id,
                    'created_at'              => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readShippingLine()
    {
        $y = DB::table('shipping_line_management')
            ->select('*')
            ->get();
        return $y;
    }

    public static function getShippingLine($x)
    {
        $result = DB::table('shipping_line_management')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editShippingLine($x)
    {
        $result = DB::table('shipping_line_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(

                    'shipping_line'           => $x['edit_shipping_line'],
                    'shipping_line_address'   => $x['edit_shipping_line_address'],
                    'updated_by'              => auth::user()->id,
                    'updated_at'              => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }


    // Consignee Managment
        public static function createConsignee($x)
    {
        $y = DB::table('consignee_management')
            ->insert(
                array(
                    'consignee'           => $x['consignee'],
                    'consignee_address'   => $x['consignee_address'],
                    'created_by'          => auth::user()->id,
                    'created_at'          => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readConsignee()
    {
        $y = DB::table('consignee_management')
            ->select('*')
            ->get();
        return $y;
    }

    public static function getConsignee($x)
    {
        $result = DB::table('consignee_management')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editConsignee($x)
    {
        $result = DB::table('consignee_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(

                    'consignee'           => $x['edit_consignee'],
                    'consignee_address'   => $x['edit_consignee_address'],
                    'updated_by'          => auth::user()->id,
                    'updated_at'          => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }

    // Particular Managment
    public static function createParticular($x)
    {
        $y = DB::table('particular_management')
            ->insert(
                array(
                    'particular'    => $x['particular'],
                    'code'          => $x['code'],
                    'status'        => 1,
                    'created_by'    => auth::user()->id,
                    'created_at'    => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readParticular()
    {
        $y = DB::table('particular_management')
            ->select('*')
            ->orderBy('code')
            ->get();
        return $y;
    }
    //test
    public static function readParticularbyPronum(Request $request)
    {
        $y = DB::table('particular_management')
            ->select('*')
            ->orderBy('code')
            ->get();
        return $y;
    }

    public static function getParticularValue()
    {
        $y = DB::table('check_request_form as crf')
            ->select(
                'crf.amount',
            )
            ->get();
        return $y;
    }

    public static function getMaintParticular($x)
    {
        $result = DB::table('particular_management')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editParticular($x)
    {
        $result = DB::table('particular_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'code'          => $x['edit_code'],
                    'particular'    => $x['edit_particular'],
                    'updated_by'     => auth::user()->id,
                    'updated_at'     => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }
    // Purpose Managment
    public static function createPurpose($x)
    {
        $y = DB::table('purpose_management')
            ->insert(
                array(
                    'name'          => $x['name'],
                    'code'          => $x['code'],
                    'created_by'    => auth::user()->id,
                    'created_at'    => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readPurpose()
    {
        $y = DB::table('purpose_management')
            ->select('*')
            ->get();
        return $y;
    }

    public static function getPurpose($x)
    {
        $result = DB::table('purpose_management')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editPurpose($x)
    {
        $result = DB::table('purpose_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'code'          => $x['edit_code'],
                    'name'    => $x['edit_name'],
                    'updated_by'     => auth::user()->id,
                    'updated_at'     => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }

 // Client Managment
    public static function createClient($x)
    {
        $y = DB::table('client_management')
            ->insert(
                array(
                    'name'          => $x['name'],
                    'code'          => $x['code'],
                    'created_by'    => auth::user()->id,
                    'created_at'    => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readClient()
    {
        $y = DB::table('client_management')
            ->select('*')
            ->get();
        return $y;
    }

    public static function getClient($x)
    {
        $result = DB::table('client_management')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editClient($x)
    {
        $result = DB::table('client_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'code'          => $x['edit_code'],
                    'name'    => $x['edit_name'],
                    'updated_by'     => auth::user()->id,
                    'updated_at'     => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }

    // Check Type
        public static function createCheckType($x)
    {
        $y = DB::table('check_type_management')
            ->insert(
                array(
                    'code'              => $x['code'],
                    'description'       => $x['description'],
                    'created_by'        => auth::user()->id,
                    'created_at'        => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readCheckType()
    {
        $y = DB::table('check_type_management')
            ->select('*')
            ->get();
        return $y;
    }

    public static function getCheckType($x)
    {
        $result = DB::table('check_type_management')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editCheckType($x)
    {
        $result = DB::table('check_type_management')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'code'              => $x['edit_code'],
                    'description'       => $x['edit_description'],
                    'updated_by'        => auth::user()->id,
                    'updated_at'        => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }

    public static function createTrailerSize($x)
    {
        $y = DB::table('trailer_sizes')
            ->insert(
                array(
                    'description' => $x['description'],
                    'amount' => $x['amount'],
                    'status'        => 0,
                    'created_by'    => auth::user()->id,
                    'created_at'    => date("Y-m-d H:i:s")

                )
            );
        return $y;
    }

    public static function readTrailerSize()
    {
        $y = DB::table('trailer_sizes')
            ->select('*')
            ->get();
        return $y;
    }

    public static function getTrailerSize($x)
    {
        $result = DB::table('trailer_sizes')
            ->select('*')
            ->where('id', '=', $x['id'])
            ->get();
        return $result;
    }

    public static function editTrailerSize($x)
    {
        $result = DB::table('trailer_sizes')
            ->where('id', '=', $x['id'])
            ->update(
                array(

                    'description'           => $x['edit_trailer_size'],
                    'amount' => $x['amount'],
                    'updated_by'     => auth::user()->id,
                    'updated_at'     => date("Y-m-d H:i:s")
                )
            );
        return $result;
    }
}