<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'category';
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
