<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveShare extends Model
{
    use HasFactory;
    protected $fillable = ['driver_id', 'id', 'longitude', 'latitude'];
}
