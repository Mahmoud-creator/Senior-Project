<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="font-bold text-xl text-center">Reset your password!</h1>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')"></x-auth-session-status>

                <form method="POST" action="/forgot-password" class="mt-10">
                    @csrf
                    <div class="mb-4 text-sm text-gray-600">
                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                    </div>
                    <x-form.input name="email" type="email" autocomplete="username" autocomplete="off"></x-form.input>
                    <div class="text-center">
                        <x-form.button>email password reset link</x-form.button>
                    </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
