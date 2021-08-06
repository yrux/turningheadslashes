<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table='products';
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function image()
    {
        return $this->morphOne('App\Model\Image', 'imageable')->where('table_name', 'products');
    }
    public function category(){
        return $this->hasOne(category::class,'id','category_id');
    }
    public function optionalimages () {
        return $this->hasMany('App\Model\imagetable','ref_id','id')->where('table_name','products_optional')->where('type',2);
    }
}
