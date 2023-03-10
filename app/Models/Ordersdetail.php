<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordersdetail extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','amount','notes','finalprice','qtyone','qtytwo','qtythree'];

    protected $table = 'ordersdetails';
}
