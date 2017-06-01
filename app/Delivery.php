<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Delivery for deliveries table
 * @package App
 */
class Delivery extends Model
{
    /**
     * Get the user for the delivery
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    /**
     * Get the bpx for the delivery
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function box()
    {
        return $this->belongsTo('App\Box');
    }
    /**
     * Get the transporter for the delivery
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transporter()
    {
        return $this->belongsTo('App\Transporter');
    }
}
