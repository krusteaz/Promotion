<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketplaceInvoice extends Model
{
	/*
	 * Get the proposal for this marketplace invoice
	 */
	public function proposal()
	{
		return $this->belongsTo('App\Proposal');
	}

	public function getTeamId()
	{
		return $this->proposal->promotion->team_id;
	}

	public function getUserId()
	{
		return $this->proposal->user_id;
	}

	public function getTeam()
	{
		return $this->proposal->promotion->team;
	}

	public function getUser()
	{
		return $this->proposal->user;
	}
}
