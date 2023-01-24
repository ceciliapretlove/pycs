<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessingItem extends Model
{
    use HasFactory;

    protected $table = 'processing_items';

    public function trailerSize(){
    	return $this->belongsTo('\App\Models\TrailerSize', 'trailer_size_id');
    }
}
