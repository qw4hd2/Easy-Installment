<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requestModel extends Model
{
    use HasFactory;
    protected $table = 'request';
    protected $primaryKey = 'r_id';
    public $timestamps = false;

    protected $fillable=[
        'r_id', 
        'r_transactionid', 
        'r_productid', 
        'r_costumerid', 
        'r_quantity', 
        'r_price', 
        'r_total', 
        'r_tax', 
        'r_montly', 
        'r_downpayment', 
        'r_year', 
        'r_status', 
        'r_date'
    ];
    public static function getRequest(){
        return self::all();
    }
    public static function getRequestCount(){
        return self::count();
    }
}
