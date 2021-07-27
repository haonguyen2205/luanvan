<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    //time create and time update to false
    protected $table = 'order_details';
    protected $primaryKey = 'order_detail_id';
    public $timestamp = false ;
    protected $fillable=['order_detail_id','order_id','room_id','room_price'];

    public function room()
    {
        return  $this->belongsToMany('App\Models\room','room','room_id','type_id','room_name','room_image','room_price','room_description','quality','room_status');
    }
}

