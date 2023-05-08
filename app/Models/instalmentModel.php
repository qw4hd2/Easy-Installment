<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instalmentModel extends Model
{
    use HasFactory;
    protected $table = "installment";
    public $timestamps = false;
    protected $primaryKey = "i_id";
    protected $fillable = [
        'i_id', 
        'i_transactionid', 
        'i_productid', 
        'i_costumerid', 
        'i_order', 
        'i_value', 
        'i_totalprice', 
        'i_tax', 
        'i_year', 
        'i_mp', 
        'i_dp', 
        'i_dpp', 
        'i_balance', 
        'i_date',
    ];
    public static function getInstalment(){
        return self::all();
    }

}
