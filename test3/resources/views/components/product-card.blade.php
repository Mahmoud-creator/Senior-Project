<article
    {{ $attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5">
        <div>
            <img src="/storage/{{ $product->thumbnail }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <a href="/?shop={{ $product->shop->id }}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{ $product->shop->name }}</a>

                    <a href="/?category={{ $product->category->slug }}"
                       class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{ $product->category->name }}
                    </a>

                    <a href="/?filter={{  ($product->is_verified($product)) ? '1' : "2"  }}"
                       class="px-3 py-1 border border-red-300 rounded-full text-xl uppercase font-semibold {{ ($product->is_verified($product)) ? "text-blue-500" : "text-red-500" }}"
                       style="font-size: 10px">{{ ($product->confirms()->where('product_id',$product->id)->count() >= 5) ? 'VERIFIED ✔' : "NOT_VERIFIED ✖"}}
                    </a>

                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/products/{{ $product->slug }}">
                            {{ $product->name }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{ $product->created_at->diffForHumans() }}</time>
                                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {!! $product->description !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">

                <div class="hidden lg:block">
                </div>
                <div>
                    Price:
                    <a
                        class="transition-colors duration-300 text-xs font-semibold bg-red-200 hover:bg-red-300 rounded-full py-2 px-8"
                    >
                        {{ $product->price }} $
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
