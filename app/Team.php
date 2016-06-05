<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;

class Team extends SparkTeam
{
	/*
	 * Get the promotions for the team
	 */
	public function promotions()
	{
		return $this->hasMany('App\Promotion');
	}
}
