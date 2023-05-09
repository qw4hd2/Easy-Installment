<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productRequestModel extends Model
{
    use HasFactory;
    protected $table ="requestproduct";
    public $timestamps =false;
    protected $primaryKey ='id';
    protected $fillable=[
        'productname', 
        'companyname', 
        'quantity', 
        'selectionPlan', 
        'description',
    ];
    public static function getProductRequest(){
        return self::all();
    }
}
