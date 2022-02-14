<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="font-bold text-xl text-center">User Log In</h1>

                <form method="POST" action="login" class="mt-10">
                    @csrf
                    <x-form.input name="email" type="email" autocomplete="username" autocomplete="off"></x-form.input>
                    <x-form.input name="password" type="password" autocomplete="current-password"></x-form.input>
                    <x-form.button>Log In</x-form.button>
                </form>
            </x-panel>
            <div class="flex flex-1">
                <a href="/login-owner" class="mx-auto">or login to your shop</a>
            </div>
        </main>
    </section>
</x-layout>
