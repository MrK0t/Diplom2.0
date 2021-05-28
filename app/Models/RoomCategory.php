<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;

    public function roomCategoryRoom()
    {
        return $this->hasMany(RoomCategoryRoom::class, 'categoryId', 'id');
    }
}
