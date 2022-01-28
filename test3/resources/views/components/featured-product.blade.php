<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a href="#"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">Product Shop</a>

                    <a href="#"
                       class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">Product Category</a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/products/{{ $product->id }}">
                            {{ $product->name }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{ $product->created_at->diffForHumans() }}</time>
                                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {!! $product->description !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">

                <div class="hidden lg:block">
                </div>
                <div class="hidden lg:block">
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
