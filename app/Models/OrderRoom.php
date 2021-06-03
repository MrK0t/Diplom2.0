<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'roomId',
        'userId',
        'sDate',
        'fDate',
    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Rooms::class, 'roomId', 'id');
    }
}
