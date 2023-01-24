<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class LiquidationParticulars extends Model
{
    protected $table = 'liquidation_particulars';
    protected $primaryKey = 'id';


    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::guard('web')->user()->id;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::guard('web')->user()->id;
        });
    }
}
