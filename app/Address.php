<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * Get the provider of the address
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function providers()
    {
        return $this->belongsTo('App\Provider');
    }

    /**
     * Get the user of the address
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->hasOne('App\User');
    }
}
