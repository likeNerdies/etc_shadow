<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
class Ingredient extends Model
{
    protected $fillable=[
        'name','info',
    ];
    protected $hidden = ['image'];
    /**
     * Get the products has the ingredient
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    /**
     * Get the users intolerant of the ingredient
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * Get the allergies of the ingredient
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function allergies(){
        return $this->belongsToMany('App\Allergy');
    }

}
