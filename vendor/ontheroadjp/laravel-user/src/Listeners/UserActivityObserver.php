<?php

namespace Ontheroadjp\LaravelUser\Listeners;

class UserActivityObserver {

	public function creating($model){
		info('UserActivityObserver@creating: '.$model);
	}

	public function created($model){
		info('UserActivityObserver@created: '.$model);
	}

	public function saving($model){
		info('UserActivityObserver@saving: '.$model);
	}

	public function saved($model){
		info('UserActivityObserver@saved: '.$model);
	}

	public function updating($model){
		info('UserActivityObserver@uodating: '.$model);
	}

	public function updated($model){
		info('UserActivityObserver@updated: '.$model);
	}
}