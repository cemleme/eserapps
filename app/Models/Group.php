<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Group extends Model {
	
	protected $table = "cmauth_groups";
	
	protected $fillable = array(
		'name', 'description'
	);
	
	public $timestamps = false;
	
	public function users()
	{
	    return $this->belongsToMany(User::class,'cmauth_group_user','group_id','user_id');
	}
	
	public function permissions()
	{
	    return $this->belongsToMany(Permission::class,'cmauth_group_permission','group_id','permission_id');
	}
}