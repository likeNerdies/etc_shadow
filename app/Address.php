<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street', 'building_number', 'building_block', 'floor', 'door', 'postal_code', 'town', 'province', 'country'
    ];

    /**
     * Get the user of the address
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
