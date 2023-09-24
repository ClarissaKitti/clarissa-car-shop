<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cust extends Model
{
    protected $table = "tbl_custs";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id',
        'nama_cust',
        'alamat',
        'email',
        'no_hp',
        'status'
    ];
}
