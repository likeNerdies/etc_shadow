<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    /**
     * Get the address of the provider
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function addresses()
    {
        return $this->hasOne('App\Address');
    }

    /**
     * Get the products of the provider
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
