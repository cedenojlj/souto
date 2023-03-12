<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','user_id','total','date1','date2','date3','comments'];

    protected $table = 'orders';


    public function ordersdetails(): HasMany
    {
        return $this->hasMany(Ordersdetail::class);
    }

}
