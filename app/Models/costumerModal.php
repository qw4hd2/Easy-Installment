<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class costumerModal extends Model
{
    use HasFactory;
    protected $table = "costumer";
    protected $primaryKey = "z_id";
    public $timestamps = false;
    protected $fillable =[
        'z_id',
        'z_idnum', 
        'z_lastname',
        'z_firstname', 
        'z_age', 
        'z_contact', 
        'z_address',
        'z_email', 
        'z_postal',
        'z_job', 
        'z_salary', 
        'z_status',
        'z_date',
        'z_pass'
    ];
    public static function getCostumer(){
        return self::all();
    }
}