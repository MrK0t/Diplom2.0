<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategoryRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'roomsId',
        'roomCategoryId'
    ];
    public $timestamps = false;

    public function room()
    {
        return $this->belongsTo(Room::class, 'roomsId', 'id');
    }
    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class, 'roomCategoryId', 'id');
    }
}
