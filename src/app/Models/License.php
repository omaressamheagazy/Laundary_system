<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class License extends Model
{
    use HasFactory;
    
    public function statuses() {
        return $this->belongsTo(RequestStatus::class,'status_id');
    }

    public static function isAllowToAddLicense($id) {
        /* 
            User is not allowed to add a new license if that license is in review or it's approved
        */
        $isAllow = License::where('user_id',$id)->where(function ($query) {
            $query->where('status_id', '=', 1)
                    ->orWhere('status_id', '=', 2);
        })->count();
        return $isAllow == 0 ? true : false; // 0 means, user  has rejected license or his request still in review 
    }

    public static function hasValidLicense($id) {
        $validLicense = false;
        $license = License::all()->where('user_id', $id)->where('status_id',2);
        if($license->count() != 0) { // means driver has license and it's approved
            if(Self::hasValidDate($license->first())) 
                $validLicense = true;
            else {
                $license->first()->status_id = 4; // deactivate the license
                $license->first()->save();
            }
        }
        return $validLicense;
    }
    /**
     * to check if the end date of the license is valid and not expired
     */
    public static function hasValidDate($license) {
        return Carbon::today()->lte($license->end_date);
    }
}
