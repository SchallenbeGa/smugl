<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <p> Be sure you are on {{ URL::current() }} </p>
        <p> You have to decrypt the following message with your pgp key and paste it in the box </p>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="mt-4">
                <!-- PGP KEY -->
                <div>
                    <x-input-label for="pub" :value="__('PGP')" />
                    <textarea id="pub" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" name="pub" required autofocus></textarea>
                    <x-input-error :messages="$errors->get('pub')" class="mt-2" />
                </div>
            </div>
            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="block mt-4">
                <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <a href="/login" type="button" class="btn btn-danger" class="reload" id="reload">
                        &#x21bb;
                    </a>
                </div>
                <x-text-input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha"/>
                <x-input-error :messages="$errors->get('captcha')" class="mt-2" />
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
