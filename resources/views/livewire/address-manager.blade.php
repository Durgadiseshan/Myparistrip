<!-- resources/views/livewire/address-manager.blade.php -->

<div>
    @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <form wire:submit.prevent="createOrUpdate">
        <div class="form-group">
            <label for="street">Street</label>
            <input wire:model="street" type="text" class="form-control" id="street">
            @error('street') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input wire:model="city" type="text" class="form-control" id="city">
            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="state">State</label>
            <input wire:model="state" type="text" class="form-control" id="state">
            @error('state') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="postalCode">Postal Code</label>
            <input wire:model="postalCode" type="text" class="form-control" id="postalCode">
            @error('postalCode') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="country">Country</label>
            <input wire:model="country" type="text" class="form-control" id="country">
            @error('country') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="addressType">Address Type</label>
            <select wire:model="addressType" class="form-control" id="addressType">
                <option value="billing">Billing</option>
                <option value="shipping">Shipping</option>
            </select>
            @error('addressType') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">{{ $addressId ? 'Update' : 'Create' }}</button>
        @if($addressId)
            <button wire:click="resetForm" type="button" class="btn btn-secondary">Cancel</button>
        @endif
    </form>

    <hr>

    @foreach($addresses as $address)
        <div>
            {{ $address->street }}, {{ $address->city }}, {{ $address->state }}, {{ $address->postal_code }}, {{ $address->country }}, {{ $address->address_type }}
            <button wire:click="edit({{ $address->id }})" class="btn btn-primary">Edit</button>
            <button wire:click="delete({{ $address->id }})" class="btn btn-danger">Delete</button>
        </div>
    @endforeach
</div>
