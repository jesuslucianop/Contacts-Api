<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addresses extends Model
{
    use HasFactory;
    protected $fillable = ['address','contactId'];
    public $timestamps = false;
    public function contact()
    {
        return $this->belongsTo('App\Models\contacts','id');
    }
}
