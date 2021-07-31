<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class timekeep extends Model
{
    use HasFactory;
    protected $table = 'timekeep';
    protected $primaryKey = 'timekeep_id';
    public $timestamps = false;
    protected $fillable=['timekeep_id','users_id','time_in','time_out',];

    public static function getTimeKeep()
    {
        $Records=DB::table('timekeep')->Select('timekeep_id','users_id','time_in','time_out');
        return $Records;
    }
}
