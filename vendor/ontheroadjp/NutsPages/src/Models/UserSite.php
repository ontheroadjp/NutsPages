<?php

namespace Ontheroadjp\NutsPages\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Exception;
use Ontheroadjp\LaravelUser\Models\UserActivity as Activity;
use Ontheroadjp\Utilities\File\FileUtilities;

class UserSite extends Model
{
    use SoftDeletes;

	protected $table = 'user_sites';
	protected $fillable = [
							'id', 
							'user_id',
							'subdomain',
							'site_name',
							'site_description',
							'site_keywords',
							'published',
							'hash',
						];
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public function user()
    {
		return $this->belongsTo('Ontheroadjp\LaravelUser\Models\User', 'user_id', 'id');
	}

	// ---------------------------------------------

	// These variables does not stored in the database.
	// Only keep in the object as an instance.
	protected $edit_dir = '';
	protected $public_dir = '';
	protected $html_templates_dir = '';

    public function __construct(array $attributes = [])
    {
		    parent::__construct($attributes);
	        $this->edit_dir = base_path('users/'.\Auth::user()->id).'/'.$this->subdomain;
		    $this->public_dir = base_path('users/public').'/'.$this->subdomain;
			$this->html_templates_dir = dirname(__FILE__).'/../../site_templates';
	}
    
    //    public function __construct(array $attributes = [])
//    {
//		if(array_key_exists('id',$attributes)){
//		    parent::__construct($attributes);
//	        $this->edit_dir = base_path('users/'.\Auth::user()->id).'/'.$this->subdomain;
//		    $this->public_dir = base_path('users/public').'/'.$this->subdomain;
//			$this->html_templates_dir = dirname(__FILE__).'/../../site_templates';
//		}else{
//		 	// This is only for Unit Test.
//			$this->edit_dir = $attributes['edit_dir'];
//		 	$this->public_dir = $attributes['public_dir'];
//		 	$this->html_templates_dir = $attributes['html_templates_dir'];
//		}
//	}
//
//	public function getEditDir()
//	{
//		return $this->edit_dir;
//	}
//
//	public function getPublicDir()
//	{
//		return $this->public_dir;
//	}
//
//	public function getHtmlTemplatesDir()
//	{
//		return $this->html_templates_dir;
//	}

    protected static function boot()
    {
		static::creating(function($model) {
			DB::beginTransaction();
			info('Begin Transaction.');
		});

		static::created(function($model) {
			try {
				if($model->createEditDirectory()){
					if($model->createPublicDirectory()) {
						DB::commit();
						info('DB Commit.');
						Activity::createdUserSite(\Auth::user()->id);
					} else {
						if($this->removeEditDirectory()){
							$model->operationFailed('createPublicDirectory() is failed.');
						} else {
							$model->operationFailed('createPublicDirectory() and removeEditDirectory are failed.');
						}
					}
				} else {
					$model->operationFailed('createEditFieldDirectory() is failed.');
				}
			} catch( Exception $e ) {
				$model->operationFailed($e->getMessage());
			}
		});

		static::deleting(function($model){
			DB::beginTransaction();
			info('Begin Transaction.');
		});

		static::deleted(function($model) {
			try{
				if($model->removePublicDirectory()){
					DB::commit();
					info('DB Commit.');
					Activity::deletedUserSite(\Auth::user()->id);
				} else {
					// 他が正常であれば、ここは常に通過しない
					$model->operationFailed('removePublicDirectory() is failed.');
				}
			} catch(Exception $e){
				$model->operationFailed($e->getMessage());
			}
			Activity::deletedUserSite(\Auth::user()->id);
		});
    }

	public function isPablished() {
		return $this->attributes['published'];
	}

	public function createEditDirectory()
	{
		$src = $this->html_templates_dir.'/business';
		return FileUtilities::dirCopy($src, $this->edit_dir);
	}

	public function removeEditDirectory()
	{
		return FileUtilities::removeDirectory($this->edit_dir);
	}

	public function createPublicDirectory()
	{
		$src_dir = $this->html_templates_dir;
		mkdir($this->public_dir);
		copy($src_dir."/index.php", $this->public_dir."/index.php");
		return true;
	}

	public function removePublicDirectory()
	{
		//return $this->remove_directory($this->public_dir.'/'.$this->subdomain);
		return FileUtilities::removeDirectory(($this->public_dir.'/'.$this->subdomain));
	}

	private function operationFailed( $errMsg ) {
		DB::rollback();
		info('DB Rollback.');
		\Session::flash('alert_danger', $errMsg);
		throw new Exception($errMsg);
	}

}
?>
