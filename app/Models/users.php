<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model 
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'users_id';
    protected $fillable=['users_id','name','email','password','phone','role','address','users_image','position_id','users_status','token'];
}
