<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporter extends Model
{
    protected $fillable=[
        'name','cif','phone_number'
    ];
    /**
     * Get the deliveries of the transporter
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveries(){
        return $this->hasMany('App\Delivery');
    }
}
