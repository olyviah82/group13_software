<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" x-data="{role_id: 2}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>
            <div>
                <x-jet-label for="phonenumber" value="{{ __('phonenumber') }}" />
                <x-jet-input id="phonenumber" class="block mt-1 w-full" type="text" name="phonenumber"
                    :value="old('phonenumber')" required autofocus autocomplete="phonenumber" />
            </div>
            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="role_id" value="{{ __('Register as:') }}" />
                <select name="role_id" x-model="role_id"
                    class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="2">worker</option>
                    <option value="3">hirer</option>
                </select>
            </div>

            <div class="mt-4" x-show="role_id == 2">
                <x-jet-label for="location_w" value="{{ __('Location') }}" />
                <x-jet-input id="location_w" class="block mt-1 w-full" type="text" :value="old('location_w')"
                    name="location_w" />
            </div>

            <div class="mt-4" x-show="role_id == 2">
                <x-jet-label for="service" value="{{ __('Service') }}" />
                <x-jet-input id="service" class="block mt-1 w-full" type="text" :value="old('service')"
                    name="service" />
            </div>

            <div class="mt-4" x-show="role_id == 3">
                <x-jet-label for="location_h" value="{{ __('Location') }}" />
                <x-jet-input id="location_h" class="block mt-1 w-full" type="text" :value="old('location_h')"
                    name="location_h" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-jet-label for="terms">
                    <div class="flex items-center">
                        <x-jet-checkbox name="terms" id="terms" />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-jet-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>