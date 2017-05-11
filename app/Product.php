<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable=[
            'name', 'price','description','expiration_date','dimension','weight','real_weight','stock','vegetarian','vegan','organic'
        ];
    /**
     * Get the brand of the product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }


    /**
     * Get the category of the product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    /**
     * Get the boxes has the product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function boxes()
    {
        return $this->belongsToMany('App\Box');
    }

    /**
     * Get the ingredient has the product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }
    /**
     * Get the images of the product
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function images(){
        return $this->hasMany('App\Image');
    }
}
