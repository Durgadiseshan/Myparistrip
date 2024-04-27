<?php

// app/Http/Livewire/AddressManager.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class AddressManager extends Component
{
    public $street;
    public $city;
    public $state;
    public $postalCode;
    public $country;
    public $addressType;
    public $addressId;

    public function render()
    {
        $addresses = Address::where('user_id', Auth::id())->get();
        return view('livewire.address-manager', ['addresses' => $addresses]);
    }

    public function createOrUpdate()
    {
        $this->validate([
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postalCode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'addressType' => 'required|string|max:255', // Add validation for addressType
        ]);

        // Check if the user already has an address of the same type
        $existingAddress = Address::where('user_id', Auth::id())
            ->where('address_type', $this->addressType)
            ->first();

        if ($existingAddress && !$this->addressId) {
            // User already has an address of the same type and it's not an update operation
            session()->flash('message', 'You can only have one ' . $this->addressType . ' address.');
            return;
        }

        $data = [
            'street' => $this->street,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postalCode,
            'country' => $this->country,
            'address_type' => $this->addressType,
            'user_id' => Auth::id(),
        ];

        if ($this->addressId) {
            // Editing an existing address
            Address::findOrFail($this->addressId)->update($data);
        } else {
            // Creating a new address
            Address::create($data);
        }

        $this->resetForm();
    }

    // Other methods...

    // public function resetForm()
    // {
    //     // Reset form fields
    //     $this->reset(['street', 'city', 'state', 'postalCode', 'country', 'addressType', 'addressId']);
    // }

    public function edit($id)
    {
        $address = Address::findOrFail($id);
        $this->addressId = $id;
        $this->street = $address->street;
        $this->city = $address->city;
        $this->state = $address->state;
        $this->postalCode = $address->postal_code;
        $this->country = $address->country;
    }

    public function delete($id)
    {
        Address::findOrFail($id)->delete();
    }

    private function resetForm()
    {
        $this->addressId = null;
        $this->street = '';
        $this->city = '';
        $this->state = '';
        $this->postalCode = '';
        $this->country = '';
    }




}
