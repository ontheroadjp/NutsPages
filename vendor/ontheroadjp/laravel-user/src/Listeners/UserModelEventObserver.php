<?php

namespace Ontheroadjp\LaravelUser\Listeners;

class UserModelEventObserver {

	public function creating($model){
		if($this->createUserDir($model)){
			return false;
		}
	}

	public function created($model){
		$this->sendWelcomeMail($model);
	}

	public function saving($model){

	}

	public function saved($model){

	}

	public function upating($model){

	}

	public function updated($model){
        // Activity::updatedUserName(\Auth::user()->id);
        // Activity::updatedEmailAddress(\Auth::user()->id);
	}

    private function sendWelcomeMail($user)
    {
       \Mail::send('emails.welcome', compact('user'), function($message) use ($user) {
           $message->to($user->email, $user->name)->subject( _('Welcome to the Nuts Pages') );
        }, 10);
    }

    private function createUserDir($user)
    {
        return mkdir(base_path('users').'/'.$user->id);
    }

}