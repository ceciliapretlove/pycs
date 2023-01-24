<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use DB;
use DomPDF;
use PDF;
use Response;
use App\Models\LiquidationGraph;

class GraphController extends Controller
{
	public function liquidatedGraph()
	{
        $query = new LiquidationGraph;
        $obj   = new \stdClass;

//Liquidated     
        $queryJanTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearJan();
        $queryFebTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearFeb();
        $queryMarTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearMar();
        $queryAprTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearApr();
        $queryMayTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearMay();
        $queryJunTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearJun();
        $queryJulTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearJul();
        $queryAugTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearAug();
        $querySepTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearSep();
        $queryOctTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearOct();
        $queryNovTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearNov();
        $queryDecTotalLiquidatedThisYear   = $query->getSumOfLiquidatedYearDec();
//Unliquidated      
        $queryJanTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearJan();
        $queryFebTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearFeb();
        $queryMarTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearMar();
        $queryAprTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearApr();
        $queryMayTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearMay();
        $queryJunTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearJun();
        $queryJulTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearJul();
        $queryAugTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearAug();
        $querySepTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearSep();
        $queryOctTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearOct();
        $queryNovTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearNov();
        $queryDecTotalUnliquidatedThisYear   = $query->getSumOfUnliquidatedYearDec();
//FAILED
        // $queryJanFailedObjectiveThisYear   = $query->getSumOfFailedObjYearJan();
        // $queryFebFailedObjectiveThisYear   = $query->getSumOfFailedObjYearFeb();
        // $queryMarFailedObjectiveThisYear   = $query->getSumOfFailedObjYearMar();
        // $queryAprFailedObjectiveThisYear   = $query->getSumOfFailedObjYearApr();
        // $queryMayFailedObjectiveThisYear   = $query->getSumOfFailedObjYearMay();
        // $queryJunFailedObjectiveThisYear   = $query->getSumOfFailedObjYearJun();
        // $queryJulFailedObjectiveThisYear   = $query->getSumOfFailedObjYearJul();
        // $queryAugFailedObjectiveThisYear   = $query->getSumOfFailedObjYearAug();
        // $querySepFailedObjectiveThisYear   = $query->getSumOfFailedObjYearSep();
        // $queryOctFailedObjectiveThisYear   = $query->getSumOfFailedObjYearOct();
        // $queryNovFailedObjectiveThisYear   = $query->getSumOfFailedObjYearNov();
        // $queryDecFailedObjectiveThisYear   = $query->getSumOfFailedObjYearDec();
        // dd($queryAugTotalUnliquidatedThisYear);
//Liquidated

            $jan_liquidated = $queryJanTotalLiquidatedThisYear[0]->amount + $queryJanTotalLiquidatedThisYear[1]->amount ?? 0;
 

            $feb_liquidated = $queryFebTotalLiquidatedThisYear[0]->amount + $queryFebTotalLiquidatedThisYear[1]->amount ?? 0;
        

            $mar_liquidated = $queryMarTotalLiquidatedThisYear[0]->amount + $queryMarTotalLiquidatedThisYear[1]->amount ?? 0;
 

            $apr_liquidated = $queryAprTotalLiquidatedThisYear[0]->amount + $queryAprTotalLiquidatedThisYear[1]->amount ?? 0;
        

            $may_liquidated = $queryMayTotalLiquidatedThisYear[0]->amount + $queryMayTotalLiquidatedThisYear[1]->amount ?? 0;
        

            $jun_liquidated = $queryJunTotalLiquidatedThisYear[0]->amount + $queryJunTotalLiquidatedThisYear[1]->amount ?? 0;
        

            $jul_liquidated = $queryJulTotalLiquidatedThisYear[0]->amount + $queryJulTotalLiquidatedThisYear[1]->amount ?? 0;


            $aug_liquidated = $queryAugTotalLiquidatedThisYear[0]->amount + $queryAugTotalLiquidatedThisYear[1]->amount ?? 0;


            $sep_liquidated = $querySepTotalLiquidatedThisYear[0]->amount + $querySepTotalLiquidatedThisYear[1]->amount ?? 0;
        
 
            $oct_liquidated = $queryOctTotalLiquidatedThisYear[0]->amount + $queryOctTotalLiquidatedThisYear[1]->amount ?? 0;
        

            $nov_liquidated = $queryNovTotalLiquidatedThisYear[0]->amount + $queryNovTotalLiquidatedThisYear[1]->amount ?? 0;
        
 
            $dec_liquidated = $queryDecTotalLiquidatedThisYear[0]->amount + $queryDecTotalLiquidatedThisYear[1]->amount ?? 0;
        

//Unliquidated

            $jan_unliquidated = $queryJanTotalUnliquidatedThisYear[0]->amount + $queryJanTotalUnliquidatedThisYear[1]->amount ?? 0;


            $feb_unliquidated = $queryFebTotalUnliquidatedThisYear[0]->amount + $queryFebTotalUnliquidatedThisYear[1]->amount ?? 0;


            $mar_unliquidated = $queryMarTotalUnliquidatedThisYear[0]->amount + $queryMarTotalUnliquidatedThisYear[1]->amount ?? 0;


            $apr_unliquidated = $queryAprTotalUnliquidatedThisYear[0]->amount + $queryAprTotalUnliquidatedThisYear[1]->amount ?? 0;


            $may_unliquidated = $queryMayTotalUnliquidatedThisYear[0]->amount + $queryMayTotalUnliquidatedThisYear[1]->amount ?? 0;


            $jun_unliquidated = $queryJunTotalUnliquidatedThisYear[0]->amount + $queryJunTotalUnliquidatedThisYear[1]->amount ?? 0;


            $jul_unliquidated = $queryJulTotalUnliquidatedThisYear[0]->amount + $queryJulTotalUnliquidatedThisYear[1]->amount ?? 0;


            $aug_unliquidated = $queryAugTotalUnliquidatedThisYear[0]->amount + $queryAugTotalUnliquidatedThisYear[1]->amount ?? 0;


            $sep_unliquidated = $querySepTotalUnliquidatedThisYear[0]->amount + $querySepTotalUnliquidatedThisYear[1]->amount ?? 0;


            $oct_unliquidated = $queryOctTotalUnliquidatedThisYear[0]->amount + $queryOctTotalUnliquidatedThisYear[1]->amount ?? 0;


            $nov_unliquidated = $queryNovTotalUnliquidatedThisYear[0]->amount + $queryNovTotalUnliquidatedThisYear[1]->amount ?? 0;
        
      
            $dec_unliquidated = $queryDecTotalUnliquidatedThisYear[0]->amount + $queryDecTotalUnliquidatedThisYear[1]->amount ?? 0;
        

//FAILED
        // foreach($queryJanFailedObjectiveThisYear as $row1) 
        // {
        //     $jan_failedobj = $row1->target_data == 0 ? '0' : number_format($row1->target_data);
        // }
        // foreach($queryFebFailedObjectiveThisYear as $row2) 
        // {
        //     $feb_failedobj = $row2->target_data == 0 ? '0' : number_format($row2->target_data);
        // }
        // foreach($queryMarFailedObjectiveThisYear as $row3) 
        // {
        //     $mar_failedobj = $row3->target_data == 0 ? '0' : number_format($row3->target_data);
        // }
        // foreach($queryAprFailedObjectiveThisYear as $row4) 
        // {
        //     $apr_failedobj = $row4->target_data == 0 ? '0' : number_format($row4->target_data);
        // }
        // foreach($queryMayFailedObjectiveThisYear as $row5) 
        // {
        //     $may_failedobj = $row5->target_data == 0 ? '0' : number_format($row5->target_data);
        // }
        // foreach($queryJunFailedObjectiveThisYear as $row6) 
        // {
        //     $jun_failedobj = $row6->target_data == 0 ? '0' : number_format($row6->target_data);
        // }
        // foreach($queryJulFailedObjectiveThisYear as $row7) 
        // {
        //     $jul_failedobj = $row7->target_data == 0 ? '0' : number_format($row7->target_data);
        // }
        // foreach($queryAugFailedObjectiveThisYear as $row8) 
        // {
        //     $aug_failedobj = $row8->target_data == 0 ? '0' : number_format($row8->target_data);
        // }
        // foreach($querySepFailedObjectiveThisYear as $row9) 
        // {
        //     $sep_failedobj = $row9->target_data == 0 ? '0' : number_format($row9->target_data);
        // }
        // foreach($queryOctFailedObjectiveThisYear as $row10) 
        // {
        //     $oct_failedobj = $row10->target_data == 0 ? '0' : number_format($row10->target_data );
        // }
        // foreach($queryNovFailedObjectiveThisYear as $row11) 
        // {
        //     $nov_failedobj = $row11->target_data == 0 ? '0' : number_format($row11->target_data );
        // }
        // foreach($queryDecFailedObjectiveThisYear as $row12) 
        // {
        //     $dec_failedobj = $row12->target_data == 0 ? '0' : number_format($row12->target_data );
        // }

        $obj->labels  		    =  array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
        $dataliquidated          =  array($jan_liquidated, $feb_liquidated, $mar_liquidated, $apr_liquidated, $may_liquidated, $jun_liquidated, $jul_liquidated, $aug_liquidated, $sep_liquidated, $oct_liquidated, $nov_liquidated, $dec_liquidated);
        $dataunliquidated          =  array($jan_unliquidated, $feb_unliquidated, $mar_unliquidated, $apr_unliquidated, $may_unliquidated, $jun_unliquidated, $jul_unliquidated, $aug_unliquidated, $sep_unliquidated, $oct_unliquidated, $nov_unliquidated, $dec_unliquidated);
        // $dataobjective2          =  array($jan_failedobj, $feb_failedobj, $mar_failedobj, $apr_failedobj, $may_failedobj, $jun_failedobj, $jul_failedobj, $aug_failedobj, $sep_failedobj, $oct_failedobj, $nov_failedobj, $dec_failedobj);
        $datasets      =  array(
                                'label'             => "Liquidated Per Month",
                                'lineTension'       => 0,
                                'data'              => $dataliquidated,
                                'borderWidth'       => 1,
                                'backgroundColor'   => "rgb(40, 101, 170)",
                                'borderColor'       => ['rgba(0,0,0,1)']
                            );
        $datasets1      =  array(
                                'label'             => "Unliquidated Per Month",
                                'lineTension'       => 0,
                                'data'              => $dataunliquidated,
                                'borderWidth'       => 1,
                                'backgroundColor'   => "rgb(252, 84, 75)",
                                'borderColor'       => ['rgba(0,0,0,1)']
                            );
        // $datasets2      =  array(
        //                         'label'             => "Failed Data Per Month",
        //                         'lineTension'       => 0,
        //                         'data'              => $dataobjective2,
        //                         'borderWidth'       => 1,
        //                         'backgroundColor'   => "rgb(71, 195, 99)",
        //                         'borderColor'       => ['rgba(0,0,0,1)']
        //                     );
        $obj->datasets = [$datasets,$datasets1];

        return response()->json(
                $obj
            );
    }
	
   
}