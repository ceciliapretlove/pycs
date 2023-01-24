<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardVariables;

class SystemAdminController extends Controller
{
    public function index(){
        $x['hexOne']                        = 1;
        $x['hexTwo']                        = 1;
        $x['hexThree']                      = 1;
        $x['hexFour']                       = 1;
        $x['hexFive']                       = 1;
        $x['countActiveEquipment']          = DashboardVariables::countActiveEquipment();
        $x['countRepairingEquipment']       = DashboardVariables::countRepairingEquipment();
        $x['countScrappedEquipment']        = DashboardVariables::countScrappedEquipment();
        $x['topThreeMostUsedEquipmentKm']   = DashboardVariables::topThreeMostUsedEquipmentKm();
        $x['topThreeMostUsedEquipmentHr']           = DashboardVariables::topThreeMostUsedEquipmentHr()->sortByDesc('sum')->take('3');
        $x['topThreeMostBreakdownEquipmentHr']      = DashboardVariables::topThreeMostBreakdownEquipmentHr()->sortByDesc('sum')->take('3');
        $x['equipmentLogs']                         = DashboardVariables::topLimitedEquipmentLogs();
        $x['materialUsed']                          = DashboardVariables::topMaterialUsed()->sortByDesc('sum')->take('3');
        $x['topThreeMostExpensiveRepairEquipment']  = DashboardVariables::topThreeMostExpensiveRepairEquipment()->sortByDesc('sum')->take('3');
    	return view('system-admin', $x);
    }
}
