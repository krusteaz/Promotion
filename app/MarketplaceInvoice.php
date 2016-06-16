<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarketplaceInvoice extends Model
{
	protected $fillable = array('promotion_id', 'proposal_id', 'invoice_id', 'total', 'tax', 'card_country', 'billing_state', 'billing_zip', 'billing_country', 'vat_id');
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
