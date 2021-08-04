<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    public $timestamps = false;
    protected $fillable=['order_id','users_id','username','status','deposit','adults','children','dayout','dayat','CMND','total'];
}
