<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRoom extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class, 'id', 'orderId');
    }

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'id', 'roomId');
    }
}
