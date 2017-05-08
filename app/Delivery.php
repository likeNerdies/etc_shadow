<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public function Box()
    {
        return $this->belongsTo('App\Box');
    }
    /**
     * Get the transporter for the delivery
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Transporter()
    {
        return $this->belongsTo('App\Transporter');
    }
}
