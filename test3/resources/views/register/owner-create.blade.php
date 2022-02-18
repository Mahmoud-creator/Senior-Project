<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-4xl mx-auto mt-10 justify-around">
            <x-panel>
                <h1 class="font-bold text-xl text-left">Registration Information</h1>
                <form method="POST" action="/register-owner">
                    @csrf
                    <div class="mt-10 flex justify-around space-x-5">
                        <div class="w-1/2">
                            <x-form.input name="owner_name" type="text" autocomplete="name"></x-form.input>
                            <x-form.input name="owner_phone" type="text" autocomplete="username"></x-form.input>
                            <x-form.input name="owner_email" type="email" autocomplete="username"></x-form.input>
                            <x-form.input name="password" type="password" autocomplete="new-password"></x-form.input>
                        </div>
                        <div class="w-1/2">
                            <x-form.input name="shop_name" type="text" autocomplete="username"></x-form.input>
                            <x-form.input name="shop_phone" type="text" autocomplete="username"></x-form.input>
                            <x-form.input name="shop_email" type="email" autocomplete="username"></x-form.input>
                        </div>

                    </div>
                    <div class="mt-16">
                        <h1 class="font-bold text-xl text-left">Shop Location</h1>
                        <div class="grid grid-cols-3 space-x-6 p-4 rounded mt-4">
                            <x-form.input name="country" type="text" autocomplete="country"
                                          class="grid-col-1"></x-form.input>
                            <x-form.input name="city" type="text" autocomplete="city" class="grid-col-2"></x-form.input>
                            <x-form.input name="street" type="text" autocomplete="street"
                                          class="grid-col-3"></x-form.input>
                        </div>
                    </div>
                    <div>
                        <x-mapbox id="mapId"
                                  :center="['long' => (isset($_GET['long'])) ? $_GET['long'] : 0 , 'lat' => (isset($_GET['lat'])) ? $_GET['lat'] : 0 ]"
                                  :draggable="true"
                                  class="w-12 mt-6"
                                  style="height: 500px; width: 100%; position: relative;"
                                  mapStyle="mapbox/navigation-night-v1"
                                  :markers="[['long' => (isset($_GET['long'])) ? $_GET['long'] : -180 , 'lat' => (isset($_GET['lat'])) ? $_GET['lat'] : -90, 'description' => 'Current Location']]"
                        ></x-mapbox>
                        <script src="/js/coordinates.js"></script>
                        <div class="space-x-6 p-4 rounded mt-4 flex justify-around items-center">
                            <x-form.input name="latitude" type="text" autocomplete="country"
                                          class="grid-col-1" value="{{ (isset($_GET['latitude'])) ? $_GET['latitude'] : old('latitude') }}"></x-form.input>
                            <x-form.input name="longitude" type="text" autocomplete="city"
                                          class="grid-col-2" value="{{ (isset($_GET['longitude'])) ? $_GET['longitude'] : old('longitude') }}"></x-form.input>
                            <button type="button" onclick="submitPosition()" class="py-2 rounded-2xl uppercase text-white fo font-semibold text-xs p px-10 hover:bg-red-600 bg-red-500 mt-10">Confirm Location</button>
                        </div>
                    </div>
                    <x-form.button class="mt-6 ml-4 mt-12">Register My Shop</x-form.button>
                </form>
            </x-panel>
            <div class="flex flex-1 mt-10 ho hover:text-blue-500">
                <a href="/register" class="mx-auto">or register as user</a>
            </div>
        </main>
    </section>
</x-layout>
