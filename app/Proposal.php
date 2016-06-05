<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total',
    ];

    /*
     * Get the marketplace invoice for the proposal
     */
    public function invoice()
    {
    	return $this->hasOne('App\MarketplaceInvoice');
    }

    /*
     * Get the promotion for the proposal
     */
    public function proposal()
    {
        return $this->belongsTo('App\Promotion');
    }
}
