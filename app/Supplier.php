<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $timestamps = false;

    public function medicines(){
        return $this->hasMany('App\Medicine','supplier_id','id');
    }

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
}
