<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\LimitedController;
use App\Http\Controllers\JobOrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItechAdminController;
use App\Http\Controllers\SystemAdminController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ReportMeanTimeController;
use App\Http\Controllers\ReportKilometerController;
use App\Http\Controllers\DispatchTripppingController;
use App\Http\Controllers\ReportUtilizationController;
use App\Http\Controllers\ReportFleetStatusController;
use App\Http\Controllers\ReportGasConsumptionController;
use App\Http\Controllers\PreventiveMaintenanceController;
use App\Http\Controllers\ReportEquipmentStatusController;
use App\Http\Controllers\ReportMaintenanceCostCountController;
use App\Http\Controllers\BillOfLadingController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\DepositSlipController;
use App\Http\Controllers\LiquidationController;
use App\Http\Controllers\LiquidationBreakdownController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\CashAdvanceController;
use App\Http\Controllers\BillingInvoiceController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\ProcessingController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GraphController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group( ['middleware' => 'auth' ], function()
{
// Route::get('/dashboard', [SystemAdminController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
// Route::get('/itech-admin', [ItechAdminController::class, 'index']);

// Route::get('/system-admin', [SystemAdminController::class, 'index']);

// Route::get('/limited', [LimitedController::class, 'index']);

// require __DIR__.'/auth.php';

Route::get('/pXSstvmTwrFDMvWJupcbUBGEZPQjUuaWuTPYzfhFbydjXXJWLh', [MaintenanceController::class, 'getNotificationBaseOnRole']);
Route::get('/rxnnSjhWZUFRKzepqFhegHdTPrDfKhKnZSAmBcxkudzMbgwdtj', [MaintenanceController::class, 'getOldNotifications']);

//Graph
Route::get('/dashboard/liquidatedGraph', [GraphController::class, 'liquidatedGraph']);

//Role
Route::get('/role', [MaintenanceController::class, 'role']);
Route::post('/createRole', [MaintenanceController::class, 'createRole']);
Route::post('/getRole', [MaintenanceController::class, 'getRole']);
Route::post('/editRole', [MaintenanceController::class, 'editRole']);


//location
Route::get('/location', [MaintenanceController::class, 'location']);
Route::post('/createLocation', [MaintenanceController::class, 'createLocation']);
Route::post('/getLocation', [MaintenanceController::class, 'getLocation']);
Route::post('/editLocation', [MaintenanceController::class, 'editLocation']);


//Preventive Maintenance
Route::get('/pms', [MaintenanceController::class, 'pms']);
Route::post('/createPmsType', [MaintenanceController::class, 'createPmsType']);
Route::post('/getPmsType', [MaintenanceController::class, 'getPmsType']);
Route::post('/editPmsType', [MaintenanceController::class, 'editPmsType']);
Route::get('/tGmxFuqkUTAWJBra{id}pmsPresetItem', [MaintenanceController::class, 'pmsItem']);
Route::post('/deletePmsItem', [MaintenanceController::class, 'deletePmsItem']);
Route::post('/editPMSItem', [MaintenanceController::class, 'editPMSItem']);
Route::post('/getPmsItem', [MaintenanceController::class, 'getPmsItem']);
Route::post('/wpgM9FWzB6gCpVNB', [MaintenanceController::class, 'pmsItemAdd']);

//Warehouse Inventory
Route::get('/warehouseInventory', [MaintenanceController::class, 'warehouseInventory']);
Route::post('/createWarehouseInventory', [MaintenanceController::class, 'createWarehouseInventory']);
Route::post('/getWarehouseInventory', [MaintenanceController::class, 'getWarehouseInventory']);
Route::post('/editWarehouseInventory', [MaintenanceController::class, 'editWarehouseInventory']);
Route::post('/deactivateWarehouseInventory', [MaintenanceController::class, 'deactivateWarehouseInventory']);
Route::post('/activateWarehouseInventory', [MaintenanceController::class, 'activateWarehouseInventory']);

Route::get('/accountManagement', [MaintenanceController::class, 'accountManagement']);
Route::post('/createAccount', [MaintenanceController::class, 'createAccount']);
Route::post('/getAccount', [MaintenanceController::class, 'getAccount']);
Route::post('/editAccount', [MaintenanceController::class, 'editAccount']);
Route::post('/deactivateAccount', [MaintenanceController::class, 'deactivateAccount']);
Route::post('/activateAccount', [MaintenanceController::class, 'activateAccount']);
Route::post('/getRoleInformation', [MaintenanceController::class, 'getRoleInformation']);


Route::get('/equipment-category', [MaintenanceController::class, 'equipmentCategory']);
Route::post('/createEquipmentCategory', [MaintenanceController::class, 'createEquipmentCategory']);
Route::post('/getEquipmentCategory', [MaintenanceController::class, 'getEquipmentCategory']);
Route::post('/editEquipmentCategory', [MaintenanceController::class, 'editEquipmentCategory']);
Route::post('/deactivateEquipmentCategory', [MaintenanceController::class, 'deactivateEquipmentCategory']);
Route::post('/activateEquipmentCategory', [MaintenanceController::class, 'activateEquipmentCategory']);

Route::get('/equipment-type', [MaintenanceController::class, 'equipmentType']);
Route::post('/createEquipmentType', [MaintenanceController::class, 'createEquipmentType']);
Route::post('/getEquipmentType', [MaintenanceController::class, 'getEquipmentType']);
Route::post('/editEquipmentType', [MaintenanceController::class, 'editEquipmentType']);
Route::post('/deactivateEquipmentType', [MaintenanceController::class, 'deactivateEquipmentType']);
Route::post('/activateEquipmentType', [MaintenanceController::class, 'activateEquipmentType']);

// Equipment Register
Route::get('/equipmentRegister', [FleetController::class, 'index']);
Route::post('/v7tHuN6x', [FleetController::class, 'filterEquipmentListOnView']);
Route::get('/gWhFQfHYjKWAueujZervUgkZJtnWGNuxuADLNjsLCqyFKDWWgk=cCREGMqnZAEmRQufNFxyjWeugpZxWs', [FleetController::class, 'addEquipmentRegister']);
Route::post('/nyeGKv', [FleetController::class, 'getEquipmentTypeBaseOnCategory']);
Route::post('/kyJLhm', [FleetController::class, 'checkIfPlateNumberEnabled']);
Route::post('/createEquipmentRegistration', [FleetController::class, 'createEquipmentRegistration']);
Route::get('/updateEquipmentDetails=vWurSks{id}faWHGBmHPaMpKdKtfebpRwJLYJCVUcbqcHmPppUSJuy', [FleetController::class, 'updateEquipmentRegister']);
Route::post('/editEquipmentRegister', [FleetController::class, 'editEquipmentRegister']);

// Dispatch
Route::get('/dispatchUtilizationTripping', [DispatchTripppingController::class, 'index']);
Route::post('/pX5xbNtn', [DispatchTripppingController::class, 'filterDispatchBaseOnFilter']);
Route::get('/createDispatchTripping=xRvZsVmxBWWHNFDuYSpEJaZsDNpvSfNmMYBZkHVAhUpDWjhgCy', [DispatchTripppingController::class, 'createDispatchTrippping']);
Route::post('/dnJLtk', [DispatchTripppingController::class, 'getEquipmentBaseOnType']);
Route::post('/createDispatchTrippingOperationsReport', [DispatchTripppingController::class, 'createDispatchTrippingOperationsReport']);
Route::get('/updateDispatchTripping=adzatECREX{id}ctTQbxFBLFbZxEFenjHshKxZRsPdJetWvxuFEvu', [DispatchTripppingController::class, 'updateDispatchTrippping']);
Route::post('/editDispatchTrippingOperationsReport', [DispatchTripppingController::class, 'editDispatchTrippingOperationsReport']);
Route::get('/viewDispatchTripping=mcukBsRETf{id}LkBYTWLkpCRpVSFNDszaBLVWkujqXvKxYEFkQLq', [DispatchTripppingController::class, 'viewDispatchTrippping']);
Route::post('/ygYPCfWAPArpFRxn', [DispatchTripppingController::class, 'checkDispatchmentTrippingReport']);
Route::post('/qMnGPzTspbnMbBak', [DispatchTripppingController::class, 'reviewDispatchmentTrippingReport']);


// Route::post('/createDispatchTrippping', [DispatchTripppingController::class, 'createDispatchTrippping']);
Route::get('/{id}bLxFfJPQgMcgsmvz=qKpjyUNBdx', [DispatchTripppingController::class, 'dispatchTrip']);
Route::post('/zTsAex', [DispatchTripppingController::class, 'addDispatchTrip']);
Route::post('/getTrip', [DispatchTripppingController::class, 'getDispatchTrip']);
Route::post('/VakjsK', [DispatchTripppingController::class, 'editDispatchTrip']);
Route::post('/deleteDispatchTrip', [DispatchTripppingController::class, 'deleteDispatchTrip']);
Route::post('/uMajHq', [DispatchTripppingController::class, 'approveDispatchTrip']);
Route::post('/kBAUFm', [DispatchTripppingController::class, 'rejectDispatchTrip']);
Route::get('/caHeWLvr/{date}', [DispatchTripppingController::class, 'completeLoopCheck']);
Route::post('/vgcTeRwy', [DispatchTripppingController::class, 'completeDispatchTrip']);

//PMS
Route::get('/preventivemaintenance', [PreventiveMaintenanceController::class, 'index']);
Route::get('/nFxXnHQmJYpkfYy{id}zpDzaFKYrDnQQfr', [PreventiveMaintenanceController::class, 'pmsUnit']);
Route::post('/createJobOrder', [PreventiveMaintenanceController::class, 'createJobOrder']);
Route::post('/getWarehouseItem', [PreventiveMaintenanceController::class, 'getWarehouseItem']);

//Job Order
Route::get('/joborder', [JobOrderController::class, 'index']);
Route::get('/joborderPDF{id}', [JobOrderController::class, 'joborderPDF']);
Route::get('/jEzzkXzhmr{id}zGzKkecwMn', [JobOrderController::class, 'editJobOrder']);
Route::post('/eWVAzQheYf', [JobOrderController::class, 'updateJobOrder']);
Route::post('/deleteJobOrderItem', [JobOrderController::class, 'deleteJobOrderItem']);
Route::get('viewJobOrder=kgTcLtGsKT{id}HmYYKpuQykDbTVqaWGFfPnMKncnxTmbutcMexHe', [JobOrderController::class, 'viewJobOrder']);
Route::post('/aMMQKddVWZMkVHRp', [JobOrderController::class, 'acceptJobOrder']);
Route::post('/xnLsKjzhvnGCxsvj', [JobOrderController::class, 'noteJobOrder']);

//Report -- Utilization
Route::get('/utilization', [ReportUtilizationController::class, 'index']);
Route::post('/getUtilizationBaseOnFilter', [ReportUtilizationController::class, 'getUtilizationBaseOnFilter']);
Route::post('/getUtilizationOperationsBaseOnFilter', [ReportUtilizationController::class, 'getUtilizationOperationsBaseOnFilter']);
// Route::get('/{id}upqTLUDdt', [ReportUtilizationController::class, 'view']);
Route::get('/reports/getHeavyUtilization', [ReportUtilizationController::class, 'getHeavyUtilization']);
Route::get('/reports/getLightUtilization', [ReportUtilizationController::class, 'getLightUtilization']);

//Report -- Fleet Status
Route::get('/equipmentoverview', [ReportFleetStatusController::class, 'index']);
Route::post('/eUDqxY6b', [ReportFleetStatusController::class, 'filterEquipmentOverviewList']);
Route::get('/viewEquipment=tfEarwUXDs{id}ghVSGPXxeMLcvVkwqcngXgcHsYKWstJDgSCGBgu', [ReportFleetStatusController::class, 'view']);
Route::get('/reports/getSelectedEquipmentGasConsumptionThisYear/{id}', [ReportFleetStatusController::class, 'getSelectedEquipmentGasConsumptionThisYear']);

//Report -- Equipment Status
Route::get('/equipmentstatus', [ReportEquipmentStatusController::class, 'index']);

Route::post('/getEquipmentsBaseOnFilter', [ReportEquipmentStatusController::class, 'getEquipmentsBaseOnFilter']);
Route::post('/gjUWAVuzfEXpZkgh', [ReportEquipmentStatusController::class, 'getOperationBaseOnFilter']);
Route::post('/vdeZgqxkQgKntdqe', [ReportEquipmentStatusController::class, 'getRepairsBaseOnFilter']);
Route::post('/fAhSJBseFSEJYCmh', [ReportEquipmentStatusController::class, 'getBreakdownBaseOnFilter']);

// Report -- Maintenance Cost
Route::get('/maintenancecost', [ReportMaintenanceCostCountController::class, 'index']);
Route::post('/generateFilterCost', [ReportMaintenanceCostCountController::class, 'generateFilterCost']);

//Report -- Gas Consumption
Route::get('/gasconsumption', [ReportGasConsumptionController::class, 'index']);
Route::post('/getGasConsumptionBaseOnFilter', [ReportGasConsumptionController::class, 'getGasConsumptionBaseOnFilter']);
Route::get('/reports/getAllGasCosumptionThisYear', [ReportGasConsumptionController::class, 'getAllGasCosumptionThisYear']);
// Route::get('/reports/getGasConsumptionHeavy', [ReportGasConsumptionController::class, 'getGasConsumptionHeavy']);
// Route::get('/reports/getGasConsumptionLight', [ReportGasConsumptionController::class, 'getGasConsumptionLight']);


//Report -- Kilometer Used
Route::get('/reports/getAllKilometerThisYear', [ReportKilometerController::class, 'getAllKilometerThisYear']);

// document information
Route::post('/createdocumentinfo', [MaintenanceController::class, 'createDocumentinfo']);
Route::post('/getdocumentinfo', [MaintenanceController::class, 'getDocumentinfo']);
Route::post('/editdocumentinfo', [MaintenanceController::class, 'editDocumentinfo']);

//Report -- Mean Time
Route::get('/meanTimeRepair', [ReportMeanTimeController::class, 'index']);
Route::post('/getMeanTimeReportBaseOnFilterMajor', [ReportMeanTimeController::class, 'getMeanTimeReportBaseOnFilterMajor']);
Route::post('/getMeanTimeReportBaseOnFilterMinor', [ReportMeanTimeController::class, 'getMeanTimeReportBaseOnFilterMinor']);
Route::post('/getMeanTimeReportBaseOnFilterMajorHours', [ReportMeanTimeController::class, 'getMeanTimeReportBaseOnFilterMajorHours']);
Route::post('/getMeanTimeReportBaseOnFilterMinorHours', [ReportMeanTimeController::class, 'getMeanTimeReportBaseOnFilterMinorHours']);


//21 Cargo

//Approval
Route::get('/approvalManagement', [MaintenanceController::class, 'approval']);
Route::post('/createApproval', [MaintenanceController::class, 'createApproval']);
Route::post('/getApproval', [MaintenanceController::class, 'getApproval']);
Route::post('/editApproval', [MaintenanceController::class, 'editApproval']);
Route::post('/activateApproval', [MaintenanceController::class, 'activateApproval']);
Route::post('/deactivateApproval', [MaintenanceController::class, 'deactivateApproval']);

//Rate
Route::get('/rateManagement', [MaintenanceController::class, 'rate']);
Route::post('/createRate', [MaintenanceController::class, 'createRate']);
Route::post('/getRate', [MaintenanceController::class, 'getRate']);
Route::post('/editRate', [MaintenanceController::class, 'editRate']);
Route::post('/activateRate', [MaintenanceController::class, 'activateRate']);
Route::post('/deactivateRate', [MaintenanceController::class, 'deactivateRate']);


//Port
Route::get('/portManagement', [MaintenanceController::class, 'port']);
Route::post('/createPort', [MaintenanceController::class, 'createPort']);
Route::post('/getPort', [MaintenanceController::class, 'getPort']);
Route::post('/editPort', [MaintenanceController::class, 'editPort']);
Route::post('/activatePort', [MaintenanceController::class, 'activatePort']);
Route::post('/deactivatePort', [MaintenanceController::class, 'deactivatePort']);


//Shipper
Route::get('/shipperManagement', [MaintenanceController::class, 'shipper']);
Route::post('/createShipper', [MaintenanceController::class, 'createShipper']);
Route::post('/getShipper', [MaintenanceController::class, 'getShipper']);
Route::post('/editShipper', [MaintenanceController::class, 'editShipper']);

//Shipping Line
Route::get('/ShippingLineManagement', [MaintenanceController::class, 'ShippingLineManagement']);
Route::post('/createShippingLine', [MaintenanceController::class, 'createShippingLine']);
Route::post('/getShippingLine', [MaintenanceController::class, 'getShippingLine']);
Route::post('/editShippingLine', [MaintenanceController::class, 'editShippingLine']);


//Consignee
Route::get('/consigneeManagement', [MaintenanceController::class, 'consignee']);
Route::post('/createConsignee', [MaintenanceController::class, 'createConsignee']);
Route::post('/getConsignee', [MaintenanceController::class, 'getConsignee']);
Route::post('/editConsignee', [MaintenanceController::class, 'editConsignee']);

//Particular
Route::get('/particularManagement', [MaintenanceController::class, 'particular']);
Route::post('/createParticular', [MaintenanceController::class, 'createParticular']);
Route::post('/getMaintParticular', [MaintenanceController::class, 'getMaintParticular']);
Route::post('/editParticular', [MaintenanceController::class, 'editParticular']);

//Purpose
Route::get('/purposeManagement', [MaintenanceController::class, 'purpose']);
Route::post('/createPurpose', [MaintenanceController::class, 'createPurpose']);
Route::post('/getPurpose', [MaintenanceController::class, 'getPurpose']);
Route::post('/editPurpose', [MaintenanceController::class, 'editPurpose']);

//Client
Route::get('/clientManagement', [MaintenanceController::class, 'Client']);
Route::post('/createClient', [MaintenanceController::class, 'createClient']);
Route::post('/getClient', [MaintenanceController::class, 'getClient']);
Route::post('/editClient', [MaintenanceController::class, 'editClient']);

//Check Type
Route::get('/ChecktypeManagement', [MaintenanceController::class, 'CheckType']);
Route::post('/createCheckType', [MaintenanceController::class, 'createCheckType']);
Route::post('/getCheckType', [MaintenanceController::class, 'getCheckType']);
Route::post('/editCheckType', [MaintenanceController::class, 'editCheckType']);

//BillofLading
Route::get('/BillofladingManagement', [BillOfLadingController::class, 'index']);
Route::get('/v=zobkdaivjwq', [BillOfLadingController::class, 'addBillOfLading']);
Route::post('/8fd6e0fb=wnqbcjsagey', [BillOfLadingController::class, 'createBillOfLading']);
Route::get('/v=utgsa{id}ogbfo', [BillOfLadingController::class, 'viewBillOfLading']);
Route::get('/c44aefde=phulep{id}fjvrz', [BillOfLadingController::class, 'editBillOfLading']);
Route::post('/fb47dd3b=nepxlwrkvhz', [BillOfLadingController::class, 'updateBillOfLading']);
Route::post('/deleteContainer', [BillOfLadingController::class, 'deleteContainer']);
Route::post('/getContainer', [BillOfLadingController::class, 'getContainer']);
Route::post('/ew4pbtuqz6', [BillOfLadingController::class, 'updateContainer']);


//Shipping
Route::get('/shippingForm', [ShippingController::class, 'index']);
Route::get('/t0f7hgqlrl4cl7g', [ShippingController::class, 'addShipping']);
Route::get('/kke8pgfif{id}osejrf', [ShippingController::class, 'getShippingDetails']);
Route::post('/createShipping', [ShippingController::class, 'createShipping']);
Route::post('/getShipping', [ShippingController::class, 'getShipping']);
Route::post('/editShipping', [ShippingController::class, 'editShipping']);
Route::get('/view{id}kNyDBi', [ShippingController::class, 'viewShipping']);
Route::get('/shipping/action', [ShippingController::class, 'action'])->name('shipping.action');
Route::get('/shipping/purposeaction', [ShippingController::class, 'purposeaction'])->name('shipping.purposeaction');
Route::get('/shipping/clientaction', [ShippingController::class, 'clientaction'])->name('shipping.clientaction');
Route::get('/shipping/pronumaction', [ShippingController::class, 'pronumaction'])->name('shipping.pronumaction');
Route::get('/shipping/payeeaction', [ShippingController::class, 'payeeaction'])->name('shipping.payeeaction');
Route::get('/shipping/pdf{id}', [ShippingController::class, 'htmlPdf']);
Route::post('/deleteShippingItem', [ShippingController::class, 'deleteShippingItem']);
Route::post('/getShippingItem', [ShippingController::class, 'getShippingItem']);
Route::post('/IkQnMBq9orDpLgP', [ShippingController::class, 'updateShippingItem']);

Route::post('/releaseShippingForm', [ShippingController::class, 'releaseShippingForm']);





//Brokerage 
// Route::get('/TaxVoucherForm', [BrokerController::class, 'index']);
// Route::post('/getTaxParticular', [BrokerController::class, 'getTaxParticular']);
// Route::post('/mtxthlrhku', [BrokerController::class, 'updateTaxParticular']);
// Route::post('/deleteTaxParticular', [BrokerController::class, 'deleteTaxParticular']);

//Processor 
// Route::get('/ProcessorForm', [BrokerController::class, 'ProcessorForm']);
// Route::get('/v=formnthonp7qxc', [BrokerController::class, 'addProcessorForm']);
// Route::get('/v=fxaaj{id}uyrl', [BrokerController::class, 'viewProcessorForm']);
// Route::post('/or7lyvqoha=42l4tl8o36', [BrokerController::class, 'createProcessorForm']);
// Route::get('/fxaaj6uyrl=jczag{id}uuamy', [BrokerController::class, 'editProcessorForm']);
// Route::post('/x6u961lv2r=ljhvpd75ti', [BrokerController::class, 'updateProcessorForm']);
// Route::get('/processor/action', [BrokerController::class, 'processoraction'])->name('processor.action');
// Route::post('/getProcessorParticular', [BrokerController::class, 'getProcessorParticular']);
// Route::post('/k1d3c1lrks', [BrokerController::class, 'updateProcessorParticular']);
// Route::post('/deleteProcessor', [BrokerController::class, 'deleteProcessor']);

//Cash Advance 
Route::get('/cashAdvanceForm', [CashAdvanceController::class, 'index']);
Route::post('/filterTableCashAdvance', [CashAdvanceController::class, 'sortByDate']);

Route::get('/v=formnthonp7qxc', [CashAdvanceController::class, 'addCashAdvance']);
Route::post('/or7lyvqoha=42l4tl8o36', [CashAdvanceController::class, 'createCashAdvance']);
Route::get('/fxaaj6uyrl=jczag{id}uuamy', [CashAdvanceController::class, 'editCashAdvance']);
Route::post('/getCashAdvanceParticular', [CashAdvanceController::class, 'getCashAdvanceParticular']);
Route::post('/k1d3c1lrks', [CashAdvanceController::class, 'updateCashAdvanceParticular']);
Route::get('/processor/action', [BrokerController::class, 'processoraction'])->name('processor.action');
Route::post('/deleteCashAdvanceParticular', [CashAdvanceController::class, 'deleteCashAdvanceParticular']);
Route::get('/cashAdvance/action', [CashAdvanceController::class, 'action'])->name('cashAdvance.action');
Route::get('/cashAdvance/particular', [CashAdvanceController::class, 'particular'])->name('cashAdvance.particular');
Route::post('/x6u961lv2r=ljhvpd75ti', [CashAdvanceController::class, 'updateCashAdvance']);
Route::get('/v=fxaaj{id}uyrl', [CashAdvanceController::class, 'viewCashAdvanceForm']);
Route::get('/check_pro_num', [CashAdvanceController::class, 'check_pro_num'])->name('check_pro_num');

// Route::get('/dMM6l3CQ7{id}uGwXQF', [CashAdvanceController::class, 'getCashAdvance']);
Route::post('/releaseCashadvance', [CashAdvanceController::class, 'releaseCashadvance']);
Route::get('/view{id}Xp8JrN', [CashAdvanceController::class, 'viewCashAdvance']);
Route::get('/cashAdvance/pdf{id}', [CashAdvanceController::class, 'htmlPdf']);

//Liquidation
Route::get('/liquidation', [LiquidationController::class, 'index']);
Route::get('/f2ggt8s1p4yzdk6', [LiquidationController::class, 'addLiquidation']);
Route::get('/hfkit15u{id}59kcdav', [LiquidationController::class, 'getLiquidationDetails']);
Route::post('/createLiquidation', [LiquidationController::class, 'createLiquidation']);
Route::post('/getLiquidation', [LiquidationController::class, 'getLiquidation']);
Route::post('/editLiquidation', [LiquidationController::class, 'editLiquidation']);
Route::get('/viewhWFMRtP{id}zVwQduE', [LiquidationController::class, 'viewLiquidationDetails']);
Route::get('/liquidation/pdf{id}', [LiquidationController::class, 'htmlPdf']);
Route::get('/liquidation/action', [LiquidationController::class, 'action'])->name('liquidation.action');
Route::post('/deleteParticular', [LiquidationController::class, 'deleteParticular']);
Route::post('/getParticular', [LiquidationController::class, 'getParticular']);
Route::post('/v5l01i90d1lmr2s', [LiquidationController::class, 'updateParticular']);
Route::post('/gxsacEBWjGtIzhS', [LiquidationController::class, 'createbreakdownItem']);


Route::post('/getProcessorID', [LiquidationController::class, 'getSelectedProcessorID']);
Route::post('/getReleasedCAID', [LiquidationController::class, 'getReleasedCashAdvanceID']);


Route::post('/getProcessingRequest', [LiquidationController::class, 'getProcessingRequest']);



//Liquidation Summary of Expenses
Route::get('/summary-of-expenses', [LiquidationController::class, 'summaryofexpenses']);
// Route::get('/t0f7hgqlrl4cl7g', [ShippingController::class, 'addShipping']);
// Route::get('/kke8pgfif{id}osejrf', [ShippingController::class, 'getShippingDetails']);
// Route::post('/createShipping', [ShippingController::class, 'createShipping']);
// Route::post('/getShipping', [ShippingController::class, 'getShipping']);
// Route::post('/editShipping', [ShippingController::class, 'editShipping']);
// Route::get('/view{id}kNyDBi', [ShippingController::class, 'viewShipping']);

//Liquidation Breakdown
Route::get('/liquidation-breakdown', [LiquidationBreakdownController::class, 'show']);
Route::post('/add-liquidation-breakdown', [LiquidationBreakdownController::class, 'store']);
Route::delete('/remove-liquidation-breakdown', [LiquidationBreakdownController::class, 'destroy']);

//Check Request Form
Route::get('/CheckRequestForm', [BrokerController::class, 'index']);
Route::get('/v=form27aa86ee', [BrokerController::class, 'addTaxVoucher']);
Route::get('/v=vrmkb{id}hvhba', [BrokerController::class, 'viewTaxVoucher']);
Route::post('/4e843fc4=d600f3b8', [BrokerController::class, 'createTaxVoucher']);
Route::get('/99870e14=pjaivd{id}qeflh', [BrokerController::class, 'editTaxVoucher']);
Route::post('/3a221e8b=ektvfdcnrpi', [BrokerController::class, 'updateTaxVoucher']);
Route::post('/getTaxParticular', [BrokerController::class, 'getTaxParticular']);
Route::post('/mtxthlrhku', [BrokerController::class, 'updateTaxParticular']);
Route::post('/deleteTaxParticular', [BrokerController::class, 'deleteTaxParticular']);
Route::get('/taxVoucher/action', [BrokerController::class, 'action'])->name('taxVoucher.action');
Route::get('/taxVoucher/checkType', [BrokerController::class, 'checkType'])->name('taxVoucher.checkType');
Route::get('/checkPaymentRequestForm/pdf{id}', [BrokerController::class, 'checkPaymentRequestPdf']);
Route::post('/releaseCheckPayment', [BrokerController::class, 'releaseCheckPayment']);

// Route::get('/v=yfarws{id}hxglx', [CashAdvanceController::class, 'viewCheckPaymentRequestForm']);
// Route::get('/v=yfarwshxglx', [CashAdvanceController::class, 'addCheckPaymentRequestForm']);
// Route::post('/cminaiwrzvq=vndgxhcaglo', [CashAdvanceController::class, 'createCheckPaymentRequestForm']);
// Route::get('/CheckPaymentRequestForm/checkrequest', [CashAdvanceController::class, 'checkrequest'])->name('CheckPaymentRequestForm.action');
// Route::get('/akxklnbmfno=tocm{id}iivmnlz', [CashAdvanceController::class, 'editCheckPaymentRequestForm']);
// Route::post('/niioomdyqyu=dhwbkjdgguc', [CashAdvanceController::class, 'updateCheckPaymentRequestForm']);

//Refund 
Route::get('/refundManagement', [RefundController::class, 'index']);
Route::get('/Rs1EIdIGVTxeKO0n', [RefundController::class, 'addRefund']);
Route::post('/createRefund', [RefundController::class, 'createRefund']);
Route::post('/editRefund', [RefundController::class, 'editRefund']);
Route::get('/v=SLOJBPW{id}KuZYaHm', [RefundController::class, 'viewRefund']);
Route::get('/oyPPcacMj{id}8QzEhh', [RefundController::class, 'getRefund']);
Route::get('/refund/action', [RefundController::class, 'action'])->name('refund.action');

//EmptyReturn
Route::get('/refundEmptyReturn', [RefundController::class, 'emptyReturnIndex']);
Route::get('/getEmptyReturn{id}', [RefundController::class, 'getEmptyReturn']);
Route::post('/updateEmptyReturn', [RefundController::class, 'updateEmptyReturn']);
Route::get('/viewEmptyReturn{id}', [RefundController::class, 'viewEmptyReturn']);
Route::post('/ForReleasingEmptyReturn', [RefundController::class, 'ForReleasingEmptyReturn']);


Route::get('/trailer-sizes', [MaintenanceController::class, 'trailerSizes']);
Route::post('/createTrailerSize', [MaintenanceController::class, 'createTrailerSize']);
Route::post('/getTrailerSize', [MaintenanceController::class, 'getTrailerSize']);
Route::post('/editTrailerSize', [MaintenanceController::class, 'editTrailerSize']);

Route::get('/processings', [ProcessingController::class, 'index']);
Route::get('/processingsCreate', [ProcessingController::class, 'create']);
Route::post('/processingsStore', [ProcessingController::class, 'store']);
Route::get('/processings{id}Show', [ProcessingController::class, 'show']);
Route::get('/processings/pdf{id}', [ProcessingController::class, 'htmlPdf']);
Route::post('/releaseProcessingForm', [ProcessingController::class, 'releaseProcessingForm']);


Route::get('/change-password', [ChangePasswordController::class, 'index']);
Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('changePassword');
Route::get('/logout', [LoginController::class, 'logout']);

//Checker
Route::get('/check_bl_num', [BillOfLadingController::class, 'check_bl_num'])->name('check_bl_num');
Route::get('/check_pro_num', [BillOfLadingController::class, 'check_pro_num'])->name('check_pro_num');
Route::get('/check_unused_pro_num', [BillOfLadingController::class, 'check_unused_pro_num'])->name('check_unused_pro_num'); // Filtered all the PRO Numbers that aren't used yet.
Route::get('/check_purpose', [MaintenanceController::class, 'check_purpose'])->name('check_purpose');
// Route::get('/check_pro_num_with_duties', [BillOfLadingController::class, 'check_pro_num_with_duties'])->name('check_pro_num_with_duties');
Route::get('/check_c_type', [MaintenanceController::class, 'check_c_type'])->name('check_c_type');

});