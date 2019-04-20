<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	//One job has many applicants
	public function applicants(){
		return $this->hasMany('App\Applicant');
	}
}
