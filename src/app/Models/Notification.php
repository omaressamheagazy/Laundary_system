<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    public static function getNotification( $userId, $category = '') {
        return self::orderBy('created_at', 'DESC')->where('user_id',$userId)->where("category",$category)->get();
    }
}
