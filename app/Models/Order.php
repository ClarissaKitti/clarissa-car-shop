<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "tbl_order";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = [
        'id',
        'cars_id',
        'custs_id',
        'date',
        'price',
        'type_payment',
        'order_desc',
        'status'
    ];
}
