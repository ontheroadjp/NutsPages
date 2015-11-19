<?php

namespace Ontheroadjp\NutsPages\Listeners;

use Illuminate\Support\Facades\DB;
use Ontheroadjp\LaravelUser\Models\UserActivity as Activity;

class UserSiteObserver {

	public function creating($model)
	{
		// info('UserSiteObserver@creating: '.$model );
		DB::beginTransaction();
		info('Begin Transaction.');
	}

	public function created($model)
	{
		// info('UserSiteObserver@created: '.$model );
		$errMsg = _('Create new site failed.');

		try {
			if($this->createSiteEditDir($model)){
				if($this->createSitePublicDir($model)) {
					DB::commit();
					info('DB Commit.');
					Activity::createdUserSite(\Auth::user()->id);
				} else {
					$this->siteCreatingFailed($errMsg.'01');
				}
			} else {
				$this->siteCreatingFailed($errMsg.'02');
			}
		} catch( \Exception $e ) {
			$this->siteCreatingFailed($e->getMessage());
		}
	}

	public function saving($model)
	{
		// info('UserSiteObserver@saving: '.var_export($model,true) );
	}

	public function saved($model)
	{
		// info('UserSiteObserver@saved: '.var_export($model,true) );
	}

	public function updating($model)
	{
		// info('UserSiteObserver@uodating: '.var_export($model,true) );
	}

	public function updated($model)
	{
		// info('UserSiteObserver@updated: '.$model);
		// if( $model['original']['name'] !== $model['attributes']['name']) {
		// 	Activity::updatedUserName(\Auth::user()->id);
		// } 
		// if( $model['original']['email'] !== $model['attributes']['email']) {
		// 	Activity::updatedUserEmailAddress(\Auth::user()->id);
		// }
	}

	public function deleting($model)
	{
		// info('UserSiteObserver@deleting: '.var_export($model,true) );
	}

	public function deleted($model)
	{
		// info('UserSiteObserver@deleted: '.var_export($model,true) );
		Activity::deletedUserSite(\Auth::user()->id);
	}

	public function restoring($model)
	{
		// info('UserSiteObserver@restoring: '.$model );
	}

	public function restored($model)
	{
		// info('UserSiteObserver@restoring: '.$model );
	}

	private function siteCreatingFailed( $errMsg ) {
		DB::rollback();
		info('DB Rollback.');
		\Session::flash('alert_danger', $errMsg);
		throw new \Exception($errMsg);
	}

	private function createSitePublicDir($model)
	{
		$src_dir = dirname(__FILE__).'/../../site_templates';
		$dist_dir = base_path('users/public').'/'.$model['attributes']['subdomain'];
		mkdir($dist_dir);
		copy($src_dir."/index.php", $dist_dir."/index.php");
		return true;
	}

	private function createSiteEditDir($model)
	{
		$src = dirname(__FILE__).'/../../site_templates/business';
		$dist = base_path('users/'.\Auth::user()->id).'/'.$model['attributes']['subdomain'];
		return $this->dir_copy($src, $dist);
	}

	private function dir_copy($src_dir, $dist_dir)
	{
		try {
			if (is_dir($src_dir)) {
				if (!is_dir($dist_dir)) {
					mkdir($dist_dir);
				}

				if ($dh = opendir($src_dir)) {
					while (($file = readdir($dh)) !== false) {
						if ($file == "." || $file == "..") {
							continue;
						}
						if (is_dir($src_dir . "/" . $file)) {
							dir_copy($src_dir . "/" . $file, $dist_dir . "/" . $file);
						}
						else {
							copy($src_dir . "/" . $file, $dist_dir . "/" . $file);
						}
					}
					closedir($dh);
				}
			} else {
				return false;
			}
		} catch( \Exception $e) {
			throw new \Exception('dir_copy() failed.');
		}
		return true;
	}
}

