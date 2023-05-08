<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stockModel extends Model
{
    use HasFactory;
    protected $table = 'logs';
    public $timestamps = false;
    protected $primaryKey = 'l_id';
    protected $fillable = [
        'l_id', 
        'l_productid', 
        'l_stock', 
        'l_price', 
        'l_order', 
        'l_totalprice', 
        'l_transaction', 
        'l_user', 
        'l_date',
    ];
    public static function getStock(){
        return self::all();
    }
}
