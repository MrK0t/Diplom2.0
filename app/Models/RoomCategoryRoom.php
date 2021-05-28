<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategoryRoom extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Room::class, 'id', 'roomsId');
    }
    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class, 'id', 'roomCategoryId');
    }
}
