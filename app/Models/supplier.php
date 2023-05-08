<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $primaryKey = 's_id'; 
    public $timestamps = false;
    protected $fillable=[
        'lastname',
        'firstname',
        'age',
        'contact',
        'address',
        'email',
        'company',
    ];
    public static function getSupplier() {
        return self::all();
    }
}
