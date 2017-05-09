<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','first_surname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the plan for the user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plan()
    {
        return $this->belongsTo('App\Plan');
    }

    /**
     * Get the address for the user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    /**
     * Get the intolerant ingredients has the user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }

    /**
     * Get the deliveries of the user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveries(){
        return $this->hasMany('App\Delivery');
    }
    /**
     * Get the allergies has the ingredient
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function allergies(){
        return $this->belongsToMany('App\Allergy');
    }
}
