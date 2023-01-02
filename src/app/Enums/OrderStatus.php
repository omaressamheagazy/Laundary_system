<?php
namespace App\Enums;

enum OrderStatus: int {
    case SEARCHING_FOR_DRIVER  = 1;
    case DRIVER_ASSIGNED =2;
    case PICK_LAUNDRY = 3;
    case DELIVER_LAUNDRY = 4;
    case CANCEL = 5;
    case COMPLETED = 6;
}