<x-layout>
    <x-setting heading="Publish New Product" :products="$products">
        <form method="post" action="/owner/products" enctype="multipart/form-data">
            @csrf
            <x-form.input name="name"></x-form.input>
            <x-form.input name="slug"></x-form.input>
            <x-form.input name="thumbnail" type="file"></x-form.input>
            <x-form.input name="price" type="number"></x-form.input>
            <x-form.textarea name="description"></x-form.textarea>

            <x-form.field>
                <x-form.label name="category"></x-form.label>
                <select name="category_id" id="category_id">
                    @foreach(App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >{{ ucfirst($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category"></x-form.error>
            </x-form.field>
            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>

</x-layout>
