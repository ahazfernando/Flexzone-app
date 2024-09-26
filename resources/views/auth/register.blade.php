<x-guest-layout>
    <div style="display: flex; min-height: 100vh;">
        <div style="flex: 1; background-image: url('{{ asset('images/logregimg.png') }}'); background-size: cover; background-position: center;">
        </div>
        
        <div style="flex: 1; display: flex; justify-content: center; align-items: center; padding: 2.4rem;">
            <x-authentication-card>
                <x-slot name="logo">
                    <div style="display: flex; justify-content: center; align-items: center; text-align: center; margin-bottom: 1.5rem;">
                        <img src="{{ asset('/images/flexzonemainlogo.png') }}" alt="" style="width: 150px; margin-right: 10px;">
                        <p style="margin: 0;">FlexZone Supplement | User Register</p>
                    </div>
                </x-slot>

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!--Cutomer Name-->
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                    <!--Cutomer Email-->
                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autocomplete="username" />
                    </div>
                    <!--Cutomer Phone Number-->
                    <div class="mt-4">
                        <x-label for="phone" value="{{ __('Phone Number') }}" />
                        <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autocomplete="username" />
                    </div>
                    <!--Cutomer Address-->
                    <div class="mt-4">
                        <x-label for="address" value="{{ __('Address') }}" />
                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="username" />
                    </div>

                    <!-- Date of Birth -->
                    <div class="mt-4">
                        <x-label for="dob" value="{{ __('Date of Birth') }}" />
                        <x-input id="dob" class="block mt-1 w-full" type="date" name="dob" :value="old('dob')" required autocomplete="bday" />
                    </div>

                    <!--Cutomer Password-->
                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
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
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="ms-4">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </x-authentication-card>
        </div>
    </div>
</x-guest-layout>
