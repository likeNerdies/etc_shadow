<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Allergy for allergies table
 * @package App
 */
class Allergy extends Model
{
    protected $fillable=[
      'name'
    ];
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
