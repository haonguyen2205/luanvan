<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    protected $table = 'room';
    protected $primaryKey = 'room_id';
    public $timestamps = false;
    protected $fillable=['room_id','type_id','room_name','room_image','room_price','room_description','quality','room_status'];


    public function type(){

        return $this->hasOne('App\Models\room; ', 'type_id');

    }
    public function order_detail(){

        return $this->hasMany('App\Models\order_detail; ','order_detail_id','order_id','room_id','room_qty','room_price');

    }
}
