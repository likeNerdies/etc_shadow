<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category for categories table
 * @package App
 */
class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable=[
      'name','info'
    ];
    /**
     * Get the products has the category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
}
