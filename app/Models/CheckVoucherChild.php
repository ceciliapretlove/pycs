<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class CheckVoucherChild extends Model
{
    protected $table = 'check_voucher_child';
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
