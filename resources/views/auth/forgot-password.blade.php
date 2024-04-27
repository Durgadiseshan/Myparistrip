@include('layouts.theme.head')
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">                
            <img src="{{ asset('images/MyParis-Logo-blue.svg') }}" class="mb-3">     
        </x-slot> 

        <div class="text-center"> 
            <p class="font-semibold mb-3 text-2xl">Forgot Password</p>
            <p class="text-gray-500">Enter your email and we'll send you a link to reset your password</p>
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block mb-4 mt-5">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full shadow-none" type="email" name="email" :value="old('email')" placeholder="Enter Your Email" required autocomplete="username" style="font-size: 14px;"/>
            </div>

            <div class="mt-5 text-center">               
                <x-button class="border-0 px-4 py-2 rounded-pill text-white bg-blue text-capitalize" style="font-size: 14px;height: 43px;letter-spacing: normal;">
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
