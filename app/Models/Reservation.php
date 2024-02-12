<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','hall_id','luxury','size','time','type','total_price','status'];

    public function hall()
    {
        return $this->belongsTo('App\Models\Hall','hall_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\TypeParty','type','id');
    }
}
