<x-layout>
    <x-panel class="max-w-7xl mt-10 mx-auto ">
        <div class="flex justify-between font-bold text-4xl text-gray-500 block my-9 mx-2 bg-gray-100 p-4 rounded-xl items-center ">
            <div class="flex">
                <h1 >Dashboard</h1>
            </div>
            <div class="flex space-x-5">
                <a href="/owners:{{ $products[0]->shop->owner->id }}/dashboard" class="font-bold text-xl {{ request()->is('owners:'.$products[0]->shop->owner->id.'/dashboard') ? "text-blue-400" : "" }}" >All Products</a>
                <a href="/owners:{{ $products[0]->shop->owner->id }}/create" class="font-bold text-xl {{ request()->is('owners:'.$products[0]->shop->owner->id.'/create') ? "text-blue-400" : "" }}" >Add Product</a>
            </div>
        </div>

    @if($products->count()>0)

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1">PRODUCT Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CATEGORY</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">UPVOTES</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">EDIT</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">DELETE</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

                            @foreach($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="/storage/{{ $product->thumbnail }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900"><a href="/products/{{ $product->slug }}">{{ $product->name }}</a></div>
                                                <div class="text-sm text-gray-500">{{ $product->created_at }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $product->category->name }}</div>
                                        <div class="text-sm text-gray-500">Optimization</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $product->is_verified == 0 ? "bg-red-100 text-red-800" : "bg-green-100 text-green-800" }} "> {{ $product->is_verified == 0 ? "NOT_VERIFIED" : "VERIFIED" }} </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->upvotes->count() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap textright text-sm font-medium">
                                        <a href="/admin/posts/{{ $product->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="post" action="/owner:{{ $product->shop->owner->id }}/product:{{ $product->id }}/delete">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-xs text-gray-400">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    @else

        <h1>No Products Have Been Added Yet!</h1>

    @endif

    </x-panel>

</x-layout>

