<x-layout>

    <x-panel class="max-w-7xl mt-10 mx-auto ">
        <div class="flex justify-between font-bold text-4xl text-gray-500 block my-9 mx-2 bg-gray-100 p-4 rounded-xl items-center ">
            <div class="flex">
                <h1>Add new product</h1>
            </div>
            <div class="flex space-x-5">
                <a href="/owners:{{ $owner->id }}/dashboard" class="font-bold text-xl {{ request()->is('owners:'.$owner->id.'/dashboard') ? "text-blue-400" : "" }}" >All Products</a>
                <a href="/owners:{{ $owner->id }}/create" class="font-bold text-xl {{ request()->is('owners:'.$owner->id.'/create') ? "text-blue-400" : "" }}" >Add Product</a>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <form method="post" action="/owner/products" enctype="multipart/form-data">
                            @csrf
                            <x-form.input name="name" class="mx-10"></x-form.input>
                            <x-form.input name="slug" class="mx-10"></x-form.input>
                            <x-form.input name="thumbnail" type="file" class="mx-10"></x-form.input>
                            <x-form.input name="price" type="number" class="mx-10"></x-form.input>
                            <x-form.textarea name="description" class="mx-10"></x-form.textarea>
                            @if(App\Models\Category::all()->count() > 1)
                            <x-form.field>
                                <x-form.label name="category" class="mx-10"></x-form.label>
                                <select name="category_id" id="category_id" class="mx-10">

                                        @foreach(App\Models\Category::all() as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                                            >{{ ucfirst($category->name) }}</option>
                                        @endforeach

                                </select>
                                <x-form.error name="category" class="mx-10"></x-form.error>
                            </x-form.field>
                            @else
                                <p class="mt-6 mx-10 text-red-500">No Categories were added yet!</p>
                            @endif
                            <x-form.button class="my-10 ml-10">Publish</x-form.button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-panel>
</x-layout>


