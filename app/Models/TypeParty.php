<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeParty extends Model
{
    use HasFactory;
    protected $fillable  = ['type','image'];

    public function booking()
    {
        return $this->hasOne('App\Models\Reservation','type','id');
    }
}
