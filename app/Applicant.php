<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
	//One applicant has many skills
	public function skills()
	{
		return $this->hasMany('App\Skill');
	}

	public function job() {
		return $this->belongsTo('App\Job');
	}
}
