<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PackageServices;

class Package extends Model
{
    use HasFactory;
    public function services() {
        return $this->hasMany(PackageServices::class,'package_id');
    }
}
