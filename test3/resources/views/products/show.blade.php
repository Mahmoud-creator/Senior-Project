<x-layout>

    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">

            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <div class="ro rounded-fu b bg-gray-100 rounded-full my-2 py-1 font-bold text-red-500">
                    Price:
                    <a
                       class=""
                    >{{ $product->price }}$</a>
                </div>
                <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published <time>{{ $product->created_at->diffForHumans() }}</time>
                </p>

                <div class="text-sm mt-4">
                    <div class="grid grid-cols-2">
                        <div class="ml-3 b align justify-aroun flex justify-around items-center rounded-full px-3.5 py-1.5 bg-gray-100 text-blue-500 hover:bg-blue-400 hover:text-white">
                            <form method="POST" action="/product/{{ $product->id }}/upvotes">
                                @csrf
                                <button>Upvote⬆</button>
                            </form>
                            <p>{{ $product->upvotes->count() }}</p>
                        </div>
                        <div class="ml-3 b align justify-aroun flex justify-around items-center rounded-full px-3.5 py-1.5 bg-gray-100 text-blue-500 hover:bg-blue-400 hover:text-white">
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
                         class="bg-red-400 text-white px-4 py-2 rounded-xl text-sm mt-8">
                        <p>
                            {{ session('stop') }}
                        </p>
                    </div>
                @elseif(session()->has('omit'))
                    <div x-data="{show: true}"
                         x-init="setTimeout(() => show = false, 4000)"
                         x-show="show"
                         class="bg-blue-400 text-white px-4 py-2 rounded-xl text-sm mt-8">
                        <p>
                            {{ session('omit') }}
                        </p>
                    </div>
                @endif
            </div>

            <div class="col-span-8">
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
                        <a href="#"
                           class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">Product Shop</a>
                        <a href="#"
                           class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                           style="font-size: 10px">{{ $product->category->name }}</a>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $product->name }}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                    {!! $product->description !!}
                </div>
            </div>
            <section class="col-start-5 col-span-8 mt-10 space-y-6">

                @include('products._add-comment-form')

                @foreach($product->comments as $comment)
                    <x-product-comment :comment="$comment"></x-product-comment>
                @endforeach
            </section>
        </article>
    </main>

</x-layout>
