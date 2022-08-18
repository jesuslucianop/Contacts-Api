<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_phones extends Model
{
    use HasFactory;

    public function phones()
    {
        return $this->belongsTo('App\Models\phones');
    }
    
}
