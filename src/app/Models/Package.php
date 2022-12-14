<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    // public function services()
    // {
    //     return $this->belongsToMany(PackageServices::class);
    // }
    public function getServicesAttribute($value)
    {
        return explode(',', $value);
    }

    public function setServicesAttribute($value)
    {
        $this->attributes['services'] = implode(',', $value);
        $services = PackageServices::all();
        $price = 0;
        foreach ($services as $service) {
            for ($i=0; $i <count($value) ; $i++ ) { 
                if($service->id == $value[$i]) $price+=$service->price;
            }
        }
        $this->attributes['price'] = $price;

    }
}
