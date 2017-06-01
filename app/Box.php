<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Box for boxes table
 * @package App
 */
class Box extends Model
{
    /**
     * Get the producs has the box
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    /**
     * Get the delivery of the box
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveries(){
        return $this->hasOne('App\Delivery');
    }
}
