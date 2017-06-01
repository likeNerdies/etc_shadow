<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image for images table
 * @package App
 */
class Image extends Model
{
    protected $fillable=[
        'image','product_id'
    ];
    protected $hidden = ['image'];
    /**
     * Get the product of the image
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
