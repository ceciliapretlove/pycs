<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LiquidationBreakdown;

class LiquidationBreakdownController extends Controller
{

    public function index()
    {
        return LiquidationBreakdown::all();
    }

    public function store(Request $request)
    {
        if(isset($request->breakdown_id))
        {
         foreach ($request->breakdown_id as $key => $value) {
            $LiquidationBreakdown = LiquidationBreakdown::updateOrCreate(
                ['id' => $value],
                [
                    'liq_particular' => $request->liq_particular[$key], 
                    'type' => $request->liquidation_breakdown_type[$key],
                    'item' => $request->item[$key],
                    'amount' => $request->amount[$key]
                ]
            );
         }
         return 1;
        }else{
            return 0;
        }
    }

    public function destroy(Request $request)
    {
        if(isset($request->id)){
            LiquidationBreakdown::find($request->id)->delete();
            return 1;
        }else{
            return 0;
        }
    }
    public function show(Request $request)
    {
        return LiquidationBreakdown::where('liq_particular',$request->liq_particular)
               ->where('type',$request->liquidation_breakdown_type)
                ->get();
    }
}
