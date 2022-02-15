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

        $attributes = array_merge($this->validateProduct(),[
            'shop_id' => request()->user()->shop,
            'thumbnail' => request()->file('thumbnail')->store("thumbnails")
        ]);

        Product::create($attributes);

        return redirect('/');
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
