<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Validation\Rule;

class OwnerProductController extends Controller
{

    public function index(Owner $owner){

        $shop = $owner->shop;
        $products = $shop->products;

        return view('owner.products.index',[
            'products' => $products,
        ]);
    }

    public function store()
    {

        $owner = auth('owner')->user();

        $attributes = array_merge($this->validateProduct(),[
            'owner_id' => $owner->id,
            'thumbnail' => request()->file('thumbnail')->store("thumbnails")
        ]);

        $product = Product::create([
            'shop_id' => $owner->shop->id,
            'category_id' => $attributes['category_id'],
            'name' => $attributes['name'],
            'slug' => $attributes['slug'],
            'price' => $attributes['price'],
            'thumbnail' => $attributes['thumbnail'],
            'description' => $attributes['description'],
            'is_verified' => false,
        ]);

        return redirect('/owners:'.auth('owner')->user()->id.'/dashboard');
    }

    protected function validateProduct(?Product $product = null)
    {
        return request()->validate([
            'name' => 'required',
            'thumbnail' => $product !== null ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('products', 'slug')->ignore($product)],
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }
}
