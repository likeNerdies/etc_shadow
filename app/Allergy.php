<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    /**
     * Get the allergies has the ingredient
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany('App\User');
    }
    public function ingredients(){
        return $this->belongsToMany('App\Ingredient');
    }
}
