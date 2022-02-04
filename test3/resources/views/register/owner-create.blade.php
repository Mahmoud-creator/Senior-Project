<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-4xl mx-auto mt-10 justify-around">
            <x-panel>
                <h1 class="font-bold text-xl text-center">Registration Information</h1>
                <div>
                    <form method="POST" action="/register-owner" class="mt-10 flex justify-around space-x-5">
                        @csrf
                        <div class="w-1/2">
                            <x-form.input name="owner_name" type="text" autocomplete="name"></x-form.input>
                            <x-form.input name="owner_phone" type="text" autocomplete="username"></x-form.input>
                            <x-form.input name="owner_email" type="email" autocomplete="username"></x-form.input>
                            <x-form.input name="password" type="password" autocomplete="new-password"></x-form.input>
                            <x-form.button>Register</x-form.button>
                        </div>
                        <div class="w-1/2">
                            <x-form.input name="shop_name" type="text" autocomplete="username"></x-form.input>
                            <x-form.input name="shop_phone" type="text" autocomplete="username"></x-form.input>
                            <x-form.input name="shop_email" type="email" autocomplete="username"></x-form.input>
                            <div class="mt-6">
                                <div class="border p-4 rounded mt-4">
                                    <x-form.input name="country" type="text" autocomplete="country"></x-form.input>
                                    <x-form.input name="city" type="text" autocomplete="city"></x-form.input>
                                    <x-form.input name="street" type="text" autocomplete="street"></x-form.input>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </x-panel>
            <div class="flex flex-1 mt-10 ho hover:text-blue-500">
                <a href="/register" class="mx-auto">or register as user</a>
            </div>
        </main>
    </section>
</x-layout>
