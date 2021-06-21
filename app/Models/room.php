<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    protected $table = 'room';
    protected $primaryKey = 'room_id';
    protected $fillable=['room_id','type_id','room_name','room_image','room_price','room_description','quality','room_status'];


    public function roomname(){

        return $this->hasMany('App\Models\room; ', 'type_id');

    }
}
