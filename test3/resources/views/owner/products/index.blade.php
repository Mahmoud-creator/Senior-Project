<x-layout>
    <x-panel class="max-w-7xl mt-10 mx-auto ">
        <div class="flex justify-between font-bold text-4xl text-gray-500 block my-9 mx-2 bg-gray-100 p-4 rounded-xl items-center ">
            <div class="flex">
                <h1>Dashboard</h1>
            </div>
            <div class="flex space-x-5">
                <a href="/owners:{{ $owner->id }}/dashboard" class="font-bold text-xl {{ request()->is('owners:'.$owner->id.'/dashboard') ? "text-blue-400" : "" }}" >All Products</a>
                <a href="/owners:{{ $owner->id }}/create" class="font-bold text-xl {{ request()->is('owners:'.$owner->id.'/create') ? "text-blue-400" : "" }}" >Add Product</a>
            </div>
        </div>

    @if($products->count()>0)

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        @if(isset($chosenProduct))
                            <div>
                                <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                    </div>
                                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Delete product</h3>
                                                        <div class="mt-2">
                                                            <p class="text-sm text-gray-500">Are you sure you want to delete this product? All of its data will be permanently removed. This action cannot be undone.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <form method="post" action="/owner:{{ auth('owner')->user()->id }}/product:{{ $chosenProduct->id }}/delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Confirm</button>
                                                </form>
                                                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><a href="/owners:{{ auth('owner')->user()->id }}/dashboard">Cancel</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="/owner:{{ $owner->id }}/product:{{ $product->id }}/edit" class="text-blue-400 hover:text-blue-500">Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap   text-sm font-medium">
                                        <form method="post" action="/owner:{{ $owner->id }}/product:{{ $product->id }}/confirm">
                                            @csrf
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

        <h1 class="text-center font-semibold text-2xl text-red-500 my-20">No Products Have Been Added Yet!</h1>

    @endif

    </x-panel>

</x-layout>

