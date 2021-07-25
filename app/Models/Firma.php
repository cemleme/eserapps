<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Firma extends Model {
	
	protected $table = 'firma';
	public $timestamps = false;
	protected $primaryKey = 'f_id';
	protected $fillable = ['f_ad', 'borc'];
	
	public static $rules = array(
		'isci'=>'required|min:2',
		'durum'=>'required|min:2'
	);

	public function icralar()
	{
	    return $this->hasMany('CEMLEME\icra\models\Icra','f_id','f_id')->orderBy('dateupdate','asc');
	}
}