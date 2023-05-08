<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'u_id';
    public $timestamps = false;
    protected $fillable = [
        'u_idnumber', 
        'u_password', 
        'u_position',
    ];
    public static function getUser(){
        return self::all();
    }
}
