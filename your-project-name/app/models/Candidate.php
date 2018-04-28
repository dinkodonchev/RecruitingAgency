<?php

use Illuminate\Auth\CandidateTrait;
use Illuminate\Auth\CandidateInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Candidate extends Eloquent implements CandidateInterface, RemindableInterface {

	use CandidateTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'candidates';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	 public function offer(){

    	return $this->belongsToMany('App\JobOffer');

    }

}