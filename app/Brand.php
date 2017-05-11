<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /**
     * Get the Products for the Brand
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
