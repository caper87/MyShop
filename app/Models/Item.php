<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    protected $table = 'item';
	protected $primaryKey = 'item_id';
	protected $fillable = [
		'item_id',
		'title',
		'slug',
		'price',
		'description',
		'features',
		'cat_id',
		'subcat_id',
		'updated_at',
	];
	
	
	public function param(){
		return $this->hasMany('App\Models\Param');
	}
	
	public function order(){
		return $this->belongsToMany('App\Models\Order');
	}
	
	public function cat(){
		return $this->hasOne('App\Models\Cat','cat_id');
	}
	
	public function subcat(){
		return $this->hasOne('App\Models\Subcat','subcat_id');
	}
}
