<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class CashAdvanceChild extends Model
{
    protected $table = 'cash_advance_child';
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
