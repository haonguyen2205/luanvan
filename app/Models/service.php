<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $table = 'service';
    protected $primaryKey = 'service_id';
    public $timestamps = false;
    protected $fillable=['service_id','service_name','name','service_price',];


}
