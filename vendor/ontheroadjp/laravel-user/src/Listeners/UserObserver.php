<?php

namespace Ontheroadjp\LaravelUser\Listeners;

use Illuminate\Support\Facades\DB;
use Ontheroadjp\LaravelUser\Models\UserActivity as Activity;

class UserObserver {

	public function creating($model){
		// info('UserObserver@creating: '.$model );
		DB::beginTransaction();
		info('Begin Transaction.');
	}

	public function created($model){
		// info('UserObserver@created: '.$model );
		if($this->createUserDir($model)){
			DB::commit();
			info('DB Commit.');
			Activity::createdUserAccount($model['attributes']['id']);
			// $this->sendWelcomeMail($model);
		} else {
			DB::rollback();
			info('DB Rollback.');
		}
	}

	public function saving($model){
		// info('UserObserver@saving: '.var_export($model,true) );
	}

	public function saved($model){
		// info('UserObserver@saved: '.var_export($model,true) );
	}

	public function updating($model){
		// info('UserObserver@uodating: '.var_export($model,true) );
		DB::beginTransaction();
		info('Begin Transaction.');
	}

	public function updated($model){
		// info('UserObserver@updated: '.$model);
		DB::commit();
		info('DB Commit.');
        
        if( $model['original']['name'] !== $model['attributes']['name'])
        {
			Activity::updatedUserName(\Auth::user()->id);
		} 
        if( $model['original']['email'] !== $model['attributes']['email'])
        {
			Activity::updatedUserEmailAddress(\Auth::user()->id);
		}
        if( $model['original']['password'] !== $model['attributes']['password'])
        {
			Activity::changePassword(\Auth::user()->id);
		}
	}

	public function deleting($model){
		// info('UserObserver@deleting: '.$model);
	}

	public function deleted($model){
		// info('UserObserver@deleted: '.$model);
	}

	public function restoring($model){
		// info('UserObserver@restoring: '.$model );
	}

	public function restored($model){
		// info('UserObserver@restoring: '.$model );
	}

	protected function sendWelcomeMail($user)
	{
		\Mail::send('LaravelUser::emails.welcome', compact('user'), function($message) use ($user) {
			$message->to($email, $name)->subject( _('Welcome to the Nuts Pages') );
		}, 10);
	}

	protected function createUserDir($model)
	{
		return mkdir(base_path('users').'/'.$model['attributes']['id']);
	}
}
