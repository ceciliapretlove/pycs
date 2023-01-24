<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Validator;
use Response;
use Auth;
use DB;

class Processing extends Model
{
    use HasFactory;

    protected $table = 'processings';

    protected $fillable = [
    	'bill_of_lading_management_id',
    	'date',
        'pcv_number',
    	'user_id',
    	'status',
    	'created_at',
    ];


    public function billOfLadingManagement(){
    	return $this->belongsTo('\App\Models\BillOfLading', 'bill_of_lading_management_id');
    }

    public function user(){
    	return $this->belongsTo('\App\Models\User', 'user_id');
    }

    public function totalAmount(){
    	$sub_total = $this->subTotal();


    	return $sub_total + $this->succeedingFees();
    }

    public function processingItems(){
    	return $this->hasMany('\App\Models\ProcessingItem', 'processing_id');
    }

    public function subTotal(){
     
    	return $this->processingItems->sum(function($item){
    		return $item->amount;
    	});
    }

    public function succeedingFees(){
    	return (count($this->processingItems) - 1) * 150;
    }

    public static function releaseProcessingForm($x)
    {
        $result = DB::table('processings')
            ->where('id', '=', $x['id'])
            ->update(
                array(
                    'release_status' => 'Released',
                    'release_date' => date("Y-m-d H:i:s")
                )
            );
     
        return $result;
    }



}
