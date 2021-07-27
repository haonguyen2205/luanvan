<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

    protected $table = 'image';
    protected $primaryKey = 'room_id';
    protected $fillable=['room_id','room_image'];
    public $timestamps = false;
}
