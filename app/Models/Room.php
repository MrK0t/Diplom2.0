<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'id', 'roomTypeId	');
    }
    public function building()
    {
        return $this->belongsTo(Building::class, 'id', 'buildingId');
    }

    public function roomCategoryRoom()
    {
        return $this->hasMany(RoomCategoryRoom::class, 'roomId', 'id');
    }

    public function orderRoom()
    {
        return $this->hasMany(OrderRoom::class, 'roomId', 'id');
    }
}
