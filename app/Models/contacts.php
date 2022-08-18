<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $fillable = ['name','lastName'];

    public function phones()
    {
        return $this->hasMany(phones::class, 'contactId');
    }
    public function addresses()
    {
        return $this->hasMany('App\Models\addresses','contactId');
    }

}
