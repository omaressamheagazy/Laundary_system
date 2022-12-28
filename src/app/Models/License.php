<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    
    public function statuses() {
        return $this->belongsTo(RequestStatus::class,'status_id');
    }

    public static function isAllowToAddLicense() {
        /* 
            User is not allowed to add a new license if that license is in review or it's approved
        */
        $isAllow = License::where(function ($query) {
            $query->where('status_id', '=', 1)
                    ->orWhere('status_id', '=', 2);
        })->count();
        return $isAllow == 0 ? true : false; // 0 means, user  has rejected license or his request still in review 
    }
}
