<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="font-bold text-xl text-center">Reset your password!</h1>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')"></x-auth-session-status>

                <form method="POST" action="{{ route('password.update') }}" class="mt-10">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ Request::route('token') }}">

                    <x-form.input name="email" type="email" autocomplete="username" autocomplete="off"></x-form.input>

                    <x-form.input name="password" type="password"></x-form.input>

                    <x-form.input name="password_confirmation" type="password"></x-form.input>

                    <div class="text-center">
                        <x-form.button>reset password</x-form.button>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
