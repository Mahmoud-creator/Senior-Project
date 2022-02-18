<x-layout>
    @include('_header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($products->count())

            <x-featured-product :product="$products[0]"></x-featured-product>

            @if($products->count() > 1)
                <div class="lg:grid lg:grid-cols-6">
                    @foreach($products->skip(1) as $product)
                        <x-product-card
                            :product="$product"
                            class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}">
                        </x-product-card>
                    @endforeach
                </div>
            @endif
        @else
            <p class="text-danger text-center fon font-semibold text-2xl text-gray-500">No products yet. Please check back later.㋡</p>
        @endif
            {{ $products->links() }}

    </main>
</x-layout>
