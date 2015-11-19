<?php

namespace Ontheroadjp\NutsPages\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Exception;
use Ontheroadjp\LaravelUser\Models\UserActivity as Activity;

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

	private $edit_dir = '';
	private $public_dir = '';
	private $html_templates_dir = '';


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->edit_dir = base_path('users/'.\Auth::user()->id).'/'.$this->subdomain;
        $this->public_dir = base_path('users/public').'/'.$this->subdomain;
        $this->html_templates_dir = dirname(__FILE__).'/../../site_templates';
    }

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
						$model->operationFailed('createPublicDirectory() is failed.');
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
					// 他が正常であれば、ここは常に通貨しない
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

	private function createEditDirectory()
	{
		$src = $this->html_templates_dir.'/business';
		return $this->dir_copy($src, $this->edit_dir);
	}

	private function createPublicDirectory()
	{
		$src_dir = $this->html_templates_dir;
		mkdir($this->public_dir);
		copy($src_dir."/index.php", $this->public_dir."/index.php");
		return true;
	}

	private function removePublicDirectory()
	{
		return $this->remove_directory($this->public_dir.'/'.$this->subdomain);
	}



	private function operationFailed( $errMsg ) {
		DB::rollback();
		info('DB Rollback.');
		\Session::flash('alert_danger', $errMsg);
		throw new Exception($errMsg);
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
						if (is_dir($src_dir."/".$file)) {
							dir_copy($src_dir."/". $file, $dist_dir."/".$file);
						}
						else {
							copy($src_dir."/".$file, $dist_dir."/".$file);
						}
					}
					closedir($dh);
				}
			} else {
				return false;
			}
		} catch( Exception $e) {
			$this->operationFailed($e->getMessage());
		}
		return true;
	}

	private function remove_directory($dir)
	{
		info('remove_directory: '.$dir);
		try {
			if( file_exists($dir) && is_dir($dir) ) {
				if ($dh = opendir($dir)) {
					while (($file = readdir($dh)) !== false) {
						if ($file == "." || $file == "..") {
							continue;
						}
						if (is_dir($dir.'/'.$file)) {
							$this->remove_directory($dir.'/'.$file);
						} else {
							unlink($dir.'/'.$file);
						}
					}
					rmdir($dir);
					closedir($dh);
				}
			} else {
				return false;
			}
		} catch( Exception $e ) {
			$this->operationFailed($e->getMessage());
		}
		return true;
	}
}
?>
