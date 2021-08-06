<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class testimonials extends Model
{
    public function image()
    {
        return $this->morphOne('App\Model\Image', 'imageable')->where('table_name', 'testimonials');
    }
}
