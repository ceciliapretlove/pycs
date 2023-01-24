<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Validator;
use Response;
use Auth;
use DB;

class roles extends Model
{
    //
    protected $fillable = ['id','role'];


    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }

}
