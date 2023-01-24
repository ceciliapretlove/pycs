<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrailerSize;
use App\Models\BillOfLading;
use App\Models\Maintenance;
use DB;
use DomPDF;
use PDF;
use App\Models\Processing;
use App\Models\ProcessingItem;

class ProcessingController extends Controller
{
    public function index(){
    	// $processings = Processing::orderBy('id', 'desc')
        // ->get();
        // $processings  = Processing::index();

        $processings = \DB::table('processings as p')
        ->select(
                'p.id as id',
                'bolm.pro_number as pro_number',
                'bolm.bl_number as bl_number',
                'bill_of_lading_management_id',
                'p.date',
                'p.pcv_number',
                'p.user_id',
                'p.status',
                'p.user_id',
                'p.release_status',
                'p.release_date',
                'pi.amount',
                'pi.remarks',
                'u.fname as u_fname',
                'u.lname as u_lname'
            )
        ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'p.bill_of_lading_management_id')
        ->leftJoin('processing_items as pi', 'pi.processing_id', '=', 'p.id')
        ->leftJoin('users as u', 'u.id', '=', 'p.user_id')
        ->orderBy('bolm.pro_number', 'desc')
        ->get();
    	return view('processings.index', compact('processings'));
    }


    public function releaseProcessingForm(Request $x)
    {
        $result = Processing::releaseProcessingForm($x);
        return \Response::json($result);
    }
    
    public function create(){
    	$trailer_sizes = TrailerSize::all();
    	$bills = BillOfLading::all();

    	return view('processings.create', compact('trailer_sizes', 'bills'));
    }

    public function store(Request $request){
    	$data = $request->all();

    	DB::transaction(function() use($data){
    		$data['user_id'] = auth()->user()->id;
                       
    		$processing = Processing::create($data);

            $processingid = $processing->id;
            $year = substr( date("Y"), -2 );        
            $pcv = 'PCV'.$year.'-'. sprintf("%05d", $processingid);
            $processing->pcv_number = $pcv;
            $processing->save();
            
    		foreach($data['remarks'] as $index => $trailer_size_id){
    			$item = new ProcessingItem;
    			$item->processing_id = $processing->id;
    			$item->remarks = $data['remarks'][$index];
                $item->amount = $data['amount'][$index];
    			$item->save();
    		}
    	});



    	session()->flash('message', 'Successfully added Processing');

    	return redirect('/processings');
    }

    public function show($id){
    	$processing = Processing::find($id);

    	return view('processings.show', compact('processing'));
    }

    public function htmlPdf($id)
    {
        
        $processing  = Processing::find($id);
         $consignee = DB::table('processings')

            ->select('*', 'consignee_management.consignee as consignee_name')
            ->leftJoin('bill_of_lading_management as bolm', 'bolm.id', '=', 'processings.bill_of_lading_management_id')
            ->leftJoin('consignee_management', 'consignee_management.id', '=', 'bolm.consignee_id')
             ->where('processings.id' ,'=' , $id)
        ->get();
        // dd($processing);
        $pdf = PDF::loadView('processings/processingsPDF',compact('processing','consignee'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('pdfview.pdf');
    }
}
