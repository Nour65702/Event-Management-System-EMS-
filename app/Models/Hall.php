<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
class Hall extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable = ['location','type','star','provider_id','city_id','rate','status','luxury'];
    public $translatedAttributes = ['name'];

    public function provider()
    {
        return $this->belongsTo('App\Models\User', 'provider_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }
    public function review()
    {
        return $this->hasOne('App\Models\Review', 'hall_id', 'id');
    }
    public function images()
    {
        return $this->hasMany('App\Models\HallImage','hall_id','id');
    }
    public function booking()
    {
        return $this->hasMany('App\Models\Reservation','hall_id','id');
    }
}
