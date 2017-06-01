<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand for brands table
 * @package App
 */
class Brand extends Model
{
    protected $fillable=[
        'name','info'
    ];
    /**
     * Get the Products for the Brand
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
