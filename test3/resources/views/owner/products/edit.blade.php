<x-layout>
    <x-panel class="max-w-7xl mt-10 mx-auto ">
        <div class="flex justify-between font-bold text-4xl text-gray-500 block my-9 mx-2 bg-gray-100 p-4 rounded-xl items-center ">
            <div class="flex">
                <h1 >Edit Product</h1>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <form method="post" action="/owner/product:{{ $product->id }}/update" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <x-form.input name="name" class="mx-10" :value="old('name', $product->name) "></x-form.input>
                            <x-form.input name="slug" class="mx-10" :value="old('slug', $product->slug) "></x-form.input>
                                <div class="flex mt-6">
                                    <div class="flex-1">
                                        <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $product->thumbnail)" class="mt-6 ml-10"></x-form.input>
                                    </div>
                                    <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
                                </div>
                            <x-form.input name="price" type="number" class="mx-10" :value="old('price', $product->price) "></x-form.input>
                            <x-form.textarea name="description" class="mx-10">
                                {!! old('description', $product->description) !!}
                            </x-form.textarea>
                            <x-form.field>
                                <x-form.label name="category" class="mx-10"></x-form.label>
                                    <select name="category_id" id="category_id" class="mx-10">
                                        @foreach(App\Models\Category::all() as $category)
                                            <option
                                                value="{{ $category->id }}"
                                                {{ old('category_id') == $product->category->id ? 'selected' : '' }}
                                            >{{ ucfirst($category->name) }}</option>
                                        @endforeach
                                    </select>
                                <x-form.error name="category" class="mx-10"></x-form.error>
                            </x-form.field>
                            <x-form.button class="my-10 ml-10">Modify</x-form.button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-panel>
</x-layout>
