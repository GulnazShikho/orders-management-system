<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Model
{
    protected $fillable=['order','OrderTitle'];
    protected $table = 'orders';
    public $timestamps = true;

 /* many to one relashionshep between user and orders
 public function user_order()
    {
        return $this->belongsTo('app\User','user_id');
    */
//one to one relashionshep between status and orders
 public function status()
 {
     return $this->belongsTo('app\OrderStatus','status_id');
 }
}

