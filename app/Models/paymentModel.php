<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentModel extends Model
{
    use HasFactory;
    protected $table='payment';
    public $timestamps = false;
    protected $primaryKey = "py_id";
    protected $fillable=[
        'py_transactionid', 
        'py_productid', 
        'py_costumerid', 
        'py_penalty', 
        'py_payment', 
        'py_date',
    ];
    public static function getPayment(){
        return self::all();
    }
}
