@include('layouts.theme.head')
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">                
            <img src="{{ asset('images/MyParis-Logo-blue.svg') }}" class="mb-3">     
        </x-slot> 

        <div class="text-center"> 
            <p class="font-semibold mb-3 text-2xl">Verify Your Email</p>
            <p class="text-gray-500">Check your email & click the link to activate your account</p>
        </div>        

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf                
                <div class="text-center">               
                    <x-button type="submit" class="border-0 px-4 py-2 rounded-pill text-white bg-blue text-capitalize" style="font-size: 14px;height: 43px;letter-spacing: normal;">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div class="mt-4 flex justify-content-center align-items-center">
                <a
                    href="{{ route('profile.show') }}"
                    class="mx-1 underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    {{ __('Edit Profile') }}</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="mx-1 underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ms-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
