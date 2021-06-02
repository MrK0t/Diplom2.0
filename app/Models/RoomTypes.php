<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public $timestamps = false;

    public function room()
    {
        return $this->hasMany(Room::class, 'roomTypeId', 'id');
    }
}
