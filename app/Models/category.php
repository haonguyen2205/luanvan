<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'cat_id';
    protected $fillable=['cate_id','cat_name'];
    public $timestamps = false;
}
