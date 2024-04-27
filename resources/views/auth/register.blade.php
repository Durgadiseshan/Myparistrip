<x-guest-layout>
  <x-authentication-card>
    <x-slot name="logo">
      <!-- <x-authentication-card-logo /> -->
    </x-slot>
    <x-validation-errors class="mb-4" />
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <!-- <div>
        <x-label for="name" value="{{ __('Name') }}" />
        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
      </div>
      <div class="mt-4">
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
      </div>
      <div class="mt-4">
        <x-label for="password" value="{{ __('Password') }}" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
      </div>
      <div class="mt-4">
        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
      </div> -->
      @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
      <!-- <div class="mt-4">
        <x-label for="terms">
          <div class="flex items-center">
            <x-checkbox name="terms" id="terms" required />
            <div class="ms-2">
              {!! __('I agree to the :terms_of_service and :privacy_policy', [
              'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
              'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
              ]) !!}
            </div>
          </div>
        </x-label>
      </div> -->
      @endif
      <!-- <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
        {{ __('Already registered?') }}
        </a>
        <x-button class="ms-4">
          {{ __('Register') }}
        </x-button>
      </div> -->
      <div class="row">
        <div class="col-xl-7 col-lg-6 col-md-12 p-0">
          <div class="signup-left">
            <p class="mb-0 text-white f-20"><span class="f-32 fw-500">Sign Up Now</span><br>to join the club of <span class="fw-500 f-24"><br>10,000+</span> Happy Travellers.</p>
          </div>
        </div>
        <div class="col-xl-5 col-lg-6 col-md-12 p-0">
          <div class="signup-right">
            <p class="f-24 fw-600 mb-3">Sign up</p>
            <p class="f-12 mb-3" style="color: #697488;">Already have an account? <span style="color: #3554D1;">Sign In</span></p>
            <div>             
              <div>
                <x-input id="email" placeholder="Email address" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
              </div>              
              <div class="row row-new mt-4">
                <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                  <div><x-input id="name"  placeholder="First name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /></div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                  <div><x-input id="name"  placeholder="Last name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /></div>
                </div>
            </div>
              <div class="position-relative">
                <x-input id="password" placeholder="Password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                <img src="{{ asset('images/eye.svg') }}" class="position-absolute" style="right: 8px;top: 13px;">
              </div>
              <div class="mt-4 position-relative">
                <x-input id="password_confirmation" placeholder="Password Confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                <img src="{{ asset('images/eye.svg') }}" class="position-absolute" style="right: 8px;top: 13px;">
              </div>
              <div class="mt-4">
                <label for="phone_number" class="block font-medium text-sm text-gray-700">Mobile Number</label>
                <input id="phone_number" type="text" name="phone_number" :value="old('phone_number')" required autofocus autocomplete="phone_number" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            </div>
            <div class="text-center">
              <button class="border-0 px-4 py-2 rounded-pill text-white f-18 fw-600 bg-blue">Sign Up</button>
            </div>
            <div class="mb-3 mt-3">
              <hr class="hr-text" data-content="or">
            </div>
            <div class="row row-new">
              <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                <div class="text-center text-sm-left"><img src="{{ asset('images/google-btn.svg') }}" class="w-100 img-auto"></div>
              </div>
              <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                <div class="text-center text-sm-left"><img src="{{ asset('images/fb-btn.svg') }}" class="w-100 img-auto"></div>
              </div>
            </div>
            <div class="mt-3">
              <label class="check-box">By clicking Sign Up, I agree that I have read and accepted the Terms of Use and Privacy Policy.
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </form>
  </x-authentication-card>
</x-guest-layout>