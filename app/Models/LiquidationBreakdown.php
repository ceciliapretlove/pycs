<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;

class LiquidationBreakdown extends Model
{
    use HasFactory;
    protected $table = 'liquidation_breakdown';

    protected $fillable = [
        'id',
        'liq_particular',
        'type',
        'item',
        'amount'
    ];


    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::guard('web')->user()->id;
            $model->created_at = date('Y-m-d H:i:s');
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::guard('web')->user()->id;
            $model->updated_at = date('Y-m-d H:i:s');
        });
    }
}


