<?php

namespace App\Models;
use App\Enums\OrderStatus as oStatus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    public function orders() {
        return $this->belongsTo(Order::class,'status_id');
    }
    /**
     * this function is filter the status based on some cases ex: the driver pick user laundry, so driver can't cancel the order
     *
     * @param int $currentChosenStatus
     * @return collection filteredStatuses
     */
    public static function  filterStatus($currentChosenStatus) {
        $excludeCancelOption = false;
        if( ($currentChosenStatus == oStatus::DELIVER_LAUNDRY->value) || ($currentChosenStatus == oStatus::PICK_LAUNDRY->value  ) )
            $excludeCancelOption = true;
        $filteredStatuses = OrderStatus::all()->where('id', '!=', oStatus::DRIVER_ASSIGNED->value)
                                        ->where('id', '!=', oStatus::SEARCHING_FOR_DRIVER->value)
                                        ->where('id', '!=', $excludeCancelOption ? oStatus::CANCEL->value : '' );
        return $filteredStatuses;
    }
}
