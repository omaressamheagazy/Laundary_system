<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveLocation extends Model
{
    use HasFactory;
    // protected $guarded = ['*'];
    protected $fillable = ['driver_id', 'longitude', 'longitude'];

    public static function hasLiveLocation($id) {
        // return LiveLocation::all()->where('driver_id')
    }
}
