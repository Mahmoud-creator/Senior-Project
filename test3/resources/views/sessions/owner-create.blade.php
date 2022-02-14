<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="font-bold text-xl text-center">Shop Log In</h1>
                @if(session()->has('success'))
                    <div x-data="{show: true}"
                         x-init="setTimeout(() => show = false, 4000)"
                         x-show="show"
                         class="fixed bottom-3 right-3 bg-blue-500 text-white px-4 py-2 rounded-xl text-sm">
                        <p>
                            {{ session('success') }}
                        </p>
                    </div>
                @endif
                <form method="POST" action="/login-owner" class="mt-10">
                    @csrf
                    <x-form.input name="email" type="email" autocomplete="username" autocomplete="off"></x-form.input>
                    <x-form.input name="password" type="password" autocomplete="password"></x-form.input>
                    <x-form.button>Log In</x-form.button>
                </form>
            </x-panel>
            <div class="flex flex-1">
                <a href="/login" class="mx-auto">or login as user</a>
            </div>
        </main>
    </section>
</x-layout>

