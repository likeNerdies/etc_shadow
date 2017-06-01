<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plan for plans table
 * @package App
 */
class Plan extends Model
{
    /**
     * @var array
     */
    protected $fillable=[
      'name','price','info'
    ];
    /**
     * Get users for the plan
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
