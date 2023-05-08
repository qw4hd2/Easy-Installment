<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class showCount extends Model
{
    use HasFactory;
    protected $table = 'product';
    
    public static function getProductCount(){
        return self::count();
    }
    
    public static function getCategoryCount(){
        return \DB::table('category')->count();
    }
    public static function getSupplierCount()
    {
        return \DB::table('supplier')->count();
    }
    public static function getCostumerCount(){
        return \DB::table('costumer')->count();
    }
    public static function getRequestCount(){
        return \DB::table('request')->count();
    }
    public static function getInstallmentCount(){
        return \DB::table('installment')->count();
    }
}
