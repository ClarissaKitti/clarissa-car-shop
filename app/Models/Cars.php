<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = "tbl_cars";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id',
        'type_car',
        'year_car',
        'colour_car',
        'remarks',
        'status'
    ];
}
