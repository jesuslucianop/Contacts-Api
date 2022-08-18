<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 class phones extends Model
{

    protected $fillable = ['number','contactId'];
    public $timestamps = false;
    use HasFactory;
/*
    public function type_phones()
    {
        return $this->hasMany('App\Models\type_phones');
    }*/
    public function contact()
    {
        return $this->belongsTo(contact::class, 'id');
    }
}
