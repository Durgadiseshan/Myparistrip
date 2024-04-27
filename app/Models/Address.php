<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'street',
        'city',
        'state',
        'postal_code',
        'country',
        'user_id',
        'address_type',
    ];

    // Define relationships if needed

    public function editAddress($id)
{
    // Retrieve the address data from the database
    $address = Address::findOrFail($id);

    // Pass the address data to the Blade view
    return view('user.profile', compact('address'));
}

}
