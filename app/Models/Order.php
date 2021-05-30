<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function orderRoom()
    {
        return $this->hasMany(OrderRoom::class, 'orderId', 'id');
    }
}
