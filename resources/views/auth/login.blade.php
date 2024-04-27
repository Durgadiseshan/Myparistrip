<x-guest-layout>
  <x-authentication-card>
    <x-slot name="logo">
      {{-- 
      <x-authentication-card-logo />
      --}}
    </x-slot>
    <x-validation-errors class="mb-4" />
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
      {{ session('status') }}
    </div>
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="loginErrors"></div> 
    <form method="POST" id="loginForm" action="{{ route('login') }}">
      @csrf
      {{-- 
      <div>
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
      </div>
      <div class="mt-4">
        <x-label for="password" value="{{ __('Password') }}" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
      </div>
      <div class="block mt-4">
        <label for="remember_me" class="flex items-center">
          <x-checkbox id="remember_me" name="remember" />
          <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
      </div>
      <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
        </a>
        @endif
        <x-button class="ms-4">
          {{ __('Log in') }}
        </x-button>
      </div>
      --}}
      <div class="row">
        <div class="col-xl-7 col-lg-6 col-md-12 p-0">
          <div class="signup-left">
            <p class="mb-0 text-white f-20"><span class="f-32 fw-500">Sign Up Now</span><br>to join the club of <span class="fw-500 f-24"><br>10,000+</span> Happy Travellers.</p>
          </div>
        </div>
        <div class="col-xl-5 col-lg-6 col-md-12 p-0">
          <div class="signup-right pb-5">
            <p class="f-24 fw-600 mb-3">Sign In</p>
            <p class="f-12 mb-3" style="color: #697488;">Don’t have an account? <span style="color: #3554D1;">Sign Up</span></p>
            <div> 
              <x-input id="email" class="block mt-1 w-full" placeholder="Email address" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
              <div class="position-relative">
                {{--
                <img src="{{ asset('images/eye.svg') }}" class="position-absolute" style="right: 8px;top: 13px;"> --}}             
                <x-input id="password" placeholder="Password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
              </div>
            </div>
            <a href="/forgot-password" style="color: #242424;" class="f-14 text-decoration-none">Forgot password?</a>
            <div class="text-center my-3">              
              <x-button class="ms-4 border-0 px-4 py-2 rounded-pill text-white f-18 fw-600 bg-blue text-capitalize" style="font-size: 18px;height: 43px;letter-spacing: normal;">
                {{ __('Sign In') }}
              </x-button>
              {{-- <a class="btn btn-success" data-toggle="modal" data-target="#otp" onclick="showOTPModal()"> --}}
                
              <x-button class="ms-4 border-0 px-4 py-2 rounded-pill text-white f-18 fw-600 bg-blue text-capitalize" style="font-size: 18px;height: 43px;letter-spacing: normal;">
                <a id="#otp" href="/otp" style="color:#fff" class="text-decoration-none">
                  Login with OTP
                </a>
              </x-button>
            </div>
            <div class="mb-3">
              <hr class="hr-text" data-content="or">
            </div>
            <div class="row row-new">
              <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                <div class="text-center text-sm-left">
                  <a href="{{ route('google.redirect') }}">
                    <img src="./images/google-btn.svg"  class="w-100 img-auto">
                </a>
                </div>
              </div>
              <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                <div class="text-center text-sm-left">
                  <a  href="{{ url('auth/facebook') }}" id="btn-fblogin">
                  <img src="./images/fb-btn.svg" class="w-100 img-auto"></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </x-authentication-card>
</x-guest-layout>
<style>
.sm\:max-w-md{
max-width:100% !important;
}
.min-h-screen {
min-height: 100%;
}
.px-6 , .py-4{
padding: 0px !important;
}
.pt-6 {
padding-top: 0px !important;
}
.mt-6{
margin-top: 0px !important;
}
.sm\:rounded-lg , .min-h-screen.flex.flex-col.sm\:justify-center.items-center.pt-6.sm\:pt-0.bg-gray-100{
border-radius: 12px !important;
}
</style>
<script>
$(document).ready(function() {
    $('#loginForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = $(this).serialize(); // Serialize form data
        var token = $('meta[name="csrf-token"]').attr('content'); // Get CSRF token

        // Submit form data via AJAX
        $.ajax({
            url: '/login', // URL for your login route
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': token // Include CSRF token in headers
            },
            data: formData,
            success: function(response) {
                // Handle successful login (e.g., redirect)
                window.location.href = '/dashboard'
            },
            error: function(xhr) {
                // Handle login errors
                var errors = xhr.responseJSON.errors;
                displayErrors(errors);
            }
        });
    });

    function displayErrors(errors) {
    // Clear previous error messages
    $('#loginErrors').empty();

    // Loop through each error and display it
    $.each(errors, function(key, value) {
        $('#loginErrors').append('<div class="alert alert-danger">' + value + '</div>');
    });

    // Show the modal if not already visible
   // $('#signin').modal('show');
}

});

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
