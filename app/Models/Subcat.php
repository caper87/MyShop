<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Subcat extends Model
{
    protected $table = 'subcat';
    protected $primaryKey = 'subcat_id';
	protected $fillable = [
		'subcat_id',
		'subcat_name',
		'cat_id',
		'subcat_descr'
	];
	
	public function cat()
    {
        return $this->belongsTo('App\Models\Cat','cat_id');
    }
    
	static public function getSubCat($cat_id,$obj = null){ //по умолчанию возвращает массив, если передать $obj - вернет объект
		if($obj === null){
			$subcat_list = [];
			$subcats = DB::table('subcat')->where('cat_id', $cat_id)->latest()->get();
	    	foreach($subcats as $v){
				$subcat_list[$v->subcat_id] = $v->subcat_name;
			}
			return $subcat_list;
			
		}else{
			 $subcats = DB::table('subcat')->where('cat_id', $cat_id)->latest()->get();
			 return $subcats;
		}
	}
}
