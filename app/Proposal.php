<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Validator;

class Proposal extends Model
{
    use SoftDeletes;

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total',
    ];

    /**
     * Set Rules
     *
     * @var array
     */
    private $rules = array(
        'user_id' => 'required',
        'total' => 'required',
    );

    /*
    * Errors From Validation
    */
    private $errors;

    /*
    * Make a new Validate object
    */
    public function validate($input)
    {
        $validator = Validator::make($input, $this->rules);

        if ($validator->fails())
        {
            $this->errors = $validator->errors();

            return false;
        }

        return $validator->passes();
    }

    /*
    * Return validation errors
    */
    public function errors()
    {
        return $this->errors;
    }

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

    public function scopePropossed($query, $promotion) 
    {
        return $query->where('promotion_id', $promotion);
    }
}
