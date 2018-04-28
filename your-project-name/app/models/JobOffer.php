<?php

use Illuminate\Auth\JobOfferTrait;
use Illuminate\Auth\JobOfferInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class JobOffer extends Eloquent implements JobOfferInterface, RemindableInterface {

	use JobOfferTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'job_offers';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	 public function candidate(){

    	return $this->hasMany('App\Candidates');

    }

}