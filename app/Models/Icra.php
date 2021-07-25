<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Icra extends Model {
	
	protected $table = 'icralar';
	public $timestamps = false;
	protected $primaryKey = 'i_id';
	protected $guarded = ['i_ad'];
	
	public static $rules = array(
		'isci'=>'required|min:2',
		'durum'=>'required|min:2'
	);

	public function firma()
	{
	    return $this->belongsTo('CEMLEME\icra\models\Firma','f_id','f_id');
	}
}