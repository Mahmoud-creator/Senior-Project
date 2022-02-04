<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="font-bold text-xl text-center">Register</h1>
                <form method="POST" action="/register" class="mt-10">
                    @csrf
                    <x-form.input name="name" type="text" autocomplete="name"></x-form.input>
                    <x-form.input name="username" type="text" autocomplete="username"></x-form.input>
                    <x-form.input name="email" type="email" autocomplete="username"></x-form.input>
                    <x-form.input name="password" type="password" autocomplete="new-password"></x-form.input>
                    <x-form.button>Register</x-form.button>
                </form>
            </x-panel>
            <div class="flex flex-1">
                <a href="/register-owner" class="mx-auto">or register your shop</a>
            </div>
        </main>
    </section>
</x-layout>
