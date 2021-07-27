<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;  

class utility extends Model
{
    use HasFactory;
    protected $table = 'utility';
    protected $primaryKey = 'utility_id';
    public $timestamps = false;
    protected $fillable=['utility_id','utility_name',];


    public function type()
    {
       return  $this->belongsToMany('App\Models\type','type_utility','type_id','utility_id');
    }
}

