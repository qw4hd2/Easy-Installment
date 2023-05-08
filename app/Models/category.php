<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table='category';
    public $timestamps = false;
    protected $primaryKey = 'c_id';
    protected $fillable = [
        'c_code', 
        'c_name', 
        'c_description',
        'c_date',
    ];
    public static function getCategory() {
        return self::all();
    }
}
