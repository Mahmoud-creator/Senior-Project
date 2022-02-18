<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">

            <div class="col-span-5 lg:text-center lg:pt-14 mb-10">
                <div class="bg-gray-100 rounded-full my-2 py-1 font-bold text-red-500 text-4xl lg:text-lg text-center mb-10 lg:mb-4">
                    Price:
                    <a
                        class=""
                    >{{ $product->price }}$</a>
                </div>
                <img src="/storage/{{ $product->thumbnail }}" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{ $product->created_at->diffForHumans() }}</time>
                </p>

                <div class="lg:text-sm mt-4 text-2xl">
                    <div class="grid grid-cols-2">
                        <div
                            class="ml-3 b align justify-aroun flex justify-around items-center rounded-full px-3.5 py-1.5 bg-gray-100 text-blue-500 hover:bg-blue-400 hover:text-white">
                            <form method="POST" action="/product/{{ $product->id }}/upvotes">
                                @csrf
                                <button>Upvote⬆</button>
                            </form>
                            <p>{{ $product->upvotes->count() }}</p>
                        </div>
                        <div
                            class="ml-3 b align justify-aroun flex justify-around items-center rounded-full px-3.5 py-1.5 bg-gray-100 text-blue-500 hover:bg-blue-400 hover:text-white">
                            <form method="POST" action="/product/{{ $product->id }}/confirm">
                                @csrf
                                <button class="">Verify✓</button>
                            </form>
                            <p>{{ $product->confirms->count() }}</p>
                        </div>
                    </div>

                </div>
                @if(session()->has('stop'))
                    <div x-data="{show: true}"
                         x-init="setTimeout(() => show = false, 4000)"
                         x-show="show"
                         class="bg-red-400 text-white px-4 py-2 rounded-xl text-sm mt-8 font-bold">
                        <p>
                            {{ session('stop') }}
                        </p>
                    </div>
                @elseif(session()->has('omit'))
                    <div x-data="{show: true}"
                         x-init="setTimeout(() => show = false, 4000)"
                         x-show="show"
                         class="bg-blue-400 text-white px-4 py-2 rounded-xl text-sm mt-8 font-bold">
                        <p>
                            {{ session('omit') }}
                        </p>
                    </div>
                @endif

                <div class="mt-12">
                    <div class="bg-gray-100 p-6 space-y-2 rounded-xl">
                        <h2 class="lg:text-sm font-semibold uppercase text-2xl text-center text-blue-50 text-blue-500 mb-5 mb-6">Location</h2>
                        <div class="space-y-2.5">
                            <h2 class="lg:text-sm te text-left border text-gray-500 rounded-xl border-gray-300 px- px-6">Country: <span class="text-red-400">{{$product->shop->country}}</span></h2>
                            <h2 class="lg:text-sm te text-left border text-gray-500 rounded-xl border-gray-300 px- px-6">City: <span class="text-red-400">{{$product->shop->city}}</span></h2>
                            <h2 class="lg:text-sm te text-left border text-gray-500 rounded-xl border-gray-300 px- px-6">Street: <span class="text-red-400">{{$product->shop->street}}</span></h2>
                        </div>
                  </div>

{{--                    <iframe--}}
{{--                        class="mt-8 w-full"--}}
{{--                        src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3612.4554709335553!2d35.49831881986617!3d33.87326532786658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m1!1m0!5e0!3m2!1sen!2slb!4v1645054325672!5m2!1sen!2slb"--}}
{{--                        width="350px" height="200px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>--}}
                    <x-mapbox id="mapId"
                              :center="['long' => $location->longitude , 'lat' => $location->latitude ]"
                              :draggable="true"
                              class="w-12 mt-6"
                              style="height: 500px; width: 100%; position: relative;"
                              mapStyle="mapbox/navigation-night-v1"
                              :markers="[['long' => $location->longitude , 'lat' => $location->latitude, 'description' => $location->location_name]]"
                    ></x-mapbox>

                </div>

            </div>

            <div class="col-span-7">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>

                        Back to Products
                    </a>
                    <div class="space-x-2">
                        <a href="/?shop={{ $product->shop->id }}"
                           class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{ $product->shop->name }}</a>
                        <a href="/?category={{ $product->category->slug }}"
                           class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{ $product->category->name }}</a>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $product->name }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
            <section class="col-start-5 col-span-8 mt-10 space-y-6">

                @include('products._add-comment-form')

                @foreach($product->comments as $comment)
                    <x-product-comment :comment="$comment"></x-product-comment>
                    @if(auth()->user() !== null and auth()->user()->email == "m@g.com")
                        <form method="post" action="/products/{{ $product->id }}/comment:{{ $comment->id }}/delete">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-400 hover:text-red-500 border border-red-500 hover:bg-red-100 rounded-full px-3 text-sm">Delete</button>
                        </form>
                    @endif
                @endforeach
            </section>
        </article>
    </main>

</x-layout>
