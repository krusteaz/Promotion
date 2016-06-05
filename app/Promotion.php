<?php

namespace App;

use App\Team;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'total',
        'active'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /*
     * Get the proposals for the promotion
     */
    public function proposals()
    {
        return $this->hasMany('App\Proposal');
    }

    /*
     * Get all the categories associated with this promotion
     */
    public function categories()
    {
        return $this->hasManyThrough('App\Category', 'App\PromotionCategory');
    }

    /*
     * Get the team for the promotion
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function scopeTeam($query, $team)
    {
        return $query->where('team_id', $team instanceof Team ? $team->id : $team);
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', false);
    }
}
