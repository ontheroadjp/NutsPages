<?php

namespace Ontheroadjp\LaravelUser\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
	protected $table = 'user_activities';
	protected $fillable = ['user_id','activity_id'];

	public function addCreateNewPage($id) {
		$this->create(['activity_id'=>'1','user_id'=>$id]);
	}

	public function addUdatedUserName($id){
		$this->create(['activity_id'=>'2','user_id'=>$id]);
	}

	public function addUdatedEmailAddress($id){
		$this->create(['activity_id'=>'3','user_id'=>$id]);
	}
}
?>
