<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'user_id',
        'status',
        'amount',
        'payment',
        'delivery',
        'adress',
        'comment',
        'updated_at',
    ];

    public function item(){
        return $this->belongsToMany('App\Models\Item');
    }

}