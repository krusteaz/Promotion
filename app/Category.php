<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /*
     * Get all the promotions that are under this category
     */
    public function promotions()
    {
    	return $this->belongsToManyThrough('App\Promotion', 'App\PromotionCategory');
    }
}
