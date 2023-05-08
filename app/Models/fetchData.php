<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fetchData extends Model
{
    use HasFactory;
    protected $table = 'product';
    public $timestamps = false;
    protected $primaryKey = 'p_id';

    protected $fillable = [
        'p_code',
        'p_name',
        'p_category',
        'p_description',
        'p_value',
        'p_quantity',
        'p_supname',
    ];

    public static function getProduct($id) {
        return self::where('p_id', $id)->first();
    }

    public static function getProducts() {
        return self::all();
    }
}
