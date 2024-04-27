@include('layouts.theme.head')
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">                
            <img src="{{ asset('images/MyParis-Logo-blue.svg') }}" class="mb-3">     
        </x-slot>       
        <div>
            <div class="text-center"> 
                <p class="font-semibold mb-3 text-2xl">OTP Verification</p>
                <p class="text-gray-500">We will send you an One Time Password on this mobile number</p>
            </div>
            <div class="mb-4 mt-5"> 
                <x-label for="email" value="{{ __('Enter Mobile Number') }}" />
                <x-input class="block mt-1 w-full shadow-none" type="tel" id="phone_number" name="phone_number" placeholder="Enter Phone Number" required style="font-size: 14px;"/>
            </div>
            <div class="mt-5 text-center">
                <!-- <button onclick="sendOTP()">Send OTP</button> -->
                <x-button onclick="sendOTP()" class="border-0 px-4 py-2 rounded-pill text-white bg-blue text-capitalize" style="font-size: 14px;height: 43px;letter-spacing: normal;">
                    {{ __('Send OTP') }}
                </x-button>
            </div>
        </div>
    
        <div id="verifyOTPForm" style="display:none;">
            <input type="text" id="verification_code" name="verification_code" placeholder="Enter OTP" required>
            <button onclick="verifyOTP()">Verify OTP</button>
        </div>

        <div id="otpStatus"></div>

        <script src=https://code.jquery.com/jquery-3.7.1.min.js></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function () {
                // Add CSRF token to all AJAX requests
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            function sendOTP() {
                var phoneNumber = $('#phone_number').val();
                $.ajax({
                    type: 'POST',
                    url: '/send-verification',
                    data: { phone_number: phoneNumber },
                    success: function (response) {
                        $('#otpStatus').text(response.message);
                        $('#sendOTPForm').hide();
                        $('#verifyOTPForm').show();
                    },
                    error: function (xhr, status, error) {
                        $('#otpStatus').text(xhr.responseJSON.message);
                    }
                });
            }

            function verifyOTP() {
                var phoneNumber = $('#phone_number').val();
                var verificationCode = $('#verification_code').val();
                $.ajax({
                    type: 'POST',
                    url: '/verify-code',
                    data: { phone_number: phoneNumber, verification_code: verificationCode },
                    success: function (response) {
                        //$('#otpStatus').text(response.message);
                    // $('#verifyOTPForm').hide();
                    setTimeout(function() {
                window.location.href = "{{ route('dashboard') }}";
            }, 500); 
                    },
                    error: function (xhr, status, error) {
                        $('#otpStatus').text(xhr.responseJSON.message);
                    }
                });
            }
        </script>

    </x-authentication-card>
</x-guest-layout>