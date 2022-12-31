<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'addresses';
    /**
     * Does something interesting
     *
     * @param user_id  -   
     * @param addressID - optional parameter, used to choose other addresses than the current address, in case of updating it's required to use it
     *
     * @return Status
     */
    public static function deactivateOtherAddresses($userId, $addressID = '')
    {
        $addresses = Address::all()->where('user_id', $userId)
            ->where('id', '!=', $addressID) // choose other addresses than the current address
            ->where('default_address', 1); // choose only the activated address
        foreach ($addresses as $address) {
            $address->default_address = 0;
            $address->save();
        }
    }

}
