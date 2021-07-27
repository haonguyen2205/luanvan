<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;
    protected $table = 'category_room';
    protected $primaryKey = 'type_id';
    public $timestamps = false;
    protected $fillable=['type_id','type_name','status'];

    public function room(){

        return $this->hasMany('App\Models\room; ', 'type_id');

    }
    public function utility()
    {
       return  $this->belongsToMany('App\Models\utility','type_utility','type_id','utility_id');
    }


}
