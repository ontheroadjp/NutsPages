<?php

namespace Ontheroadjp\NutsPages\Listeners;

use Illuminate\Support\Facades\DB;
use Ontheroadjp\LaravelUser\Models\UserActivity as Activity;

class UserSiteObserver {

	public function creating($model){
		// info('UserSiteObserver@creating: '.$model );
		DB::beginTransaction();
		info('Begin Transaction.');
	}

	public function created($model){
		// info('UserSiteObserver@created: '.$model );
		if($this->createUserSiteDir($model)){
			DB::commit();
			info('DB Commit.');
			Activity::createdUserSite(\Auth::user()->id);
		} else {
			DB::rollback();
			info('DB Rollback.');
		}
	}

	public function saving($model){
		// info('UserSiteObserver@saving: '.var_export($model,true) );
	}

	public function saved($model){
		// info('UserSiteObserver@saved: '.var_export($model,true) );
	}

	public function updating($model){
		// info('UserSiteObserver@uodating: '.var_export($model,true) );
	}

	public function updated($model){
		// info('UserSiteObserver@updated: '.$model);
		// if( $model['original']['name'] !== $model['attributes']['name']) {
		// 	Activity::updatedUserName(\Auth::user()->id);
		// } 
		// if( $model['original']['email'] !== $model['attributes']['email']) {
		// 	Activity::updatedUserEmailAddress(\Auth::user()->id);
		// }
	}

	public function deleting($model){
		// info('UserSiteObserver@deleting: '.var_export($model,true) );
	}

	public function deleted($model){
		// info('UserSiteObserver@deleted: '.var_export($model,true) );
		Activity::deletedUserSite(\Auth::user()->id);
	}

	public function restoring($model){
		// info('UserSiteObserver@restoring: '.$model );
	}

	public function restored($model){
		// info('UserSiteObserver@restoring: '.$model );
	}

	private function createUserSiteDir($model)
	{
		$path = base_path('users/'.\Auth::user()->hash).'/'.$model['attributes']['hash'];
		info('Made Directory: '.$path);
		return mkdir($path);
	}
}