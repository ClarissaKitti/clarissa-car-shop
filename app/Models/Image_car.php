<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_car extends Model
{
    protected $table = "tbl_image_car";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id',
        'cars_id',
        'file'
    ];
}
