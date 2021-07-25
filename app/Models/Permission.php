<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model {
	
	protected $table = "cmauth_permissions";
	
	protected $fillable = array(
		'name', 'description'
	);
	
	public $timestamps = false;
	
	public function groups()
	{
	    return $this->belongsToMany(Group::class,'cmauth_group_permission','permission_id','group_id');
	}
 
}