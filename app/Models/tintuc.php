<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tintuc extends Model
{
    use HasFactory;
    protected $table = 'new';
    protected $primaryKey = 'new_id';
    public $timestamps = false;
    protected $fillable=['new_id','new_name','new_image','new_content','date_post','cat_id'];
}
