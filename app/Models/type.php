<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;
    protected $table = 'type';
    protected $primaryKey = 'type_id';
    protected $fillable=['type_id','type_name','status'];

    public function roomname(){

        return $this->hasMany('App\Models\room; ', 'type_id');

    }
}
