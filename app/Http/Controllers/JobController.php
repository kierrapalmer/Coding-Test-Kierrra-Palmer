<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Skill;
use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
	public function getIndex(){
		$jobs =  Job::all();
		$applicantsCount = count(Applicant::all());                         //gives a count of all people who have a applied to a job
		$skillsCount = count(Skill::distinct()->get('name'));               //gives a DISTINCT count of skills that have been entered
		return view('index', [
			'jobs'=>$jobs,
			'applicantsCount'=> $applicantsCount,
			'skillsCount'=> $skillsCount
		]);
	}
}
