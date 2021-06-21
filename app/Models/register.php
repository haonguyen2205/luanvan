<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class register extends Model
{
    use HasFactory;
    protected $table = '';
    protected $primaryKey = 'id';
    protected $fillable=['type_id','type_name','status'];
}
