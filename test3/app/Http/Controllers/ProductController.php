<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::orderBy('price', 'asc')
                ->filter(request(['search','category','filter','shop']))
                ->paginate(5)->withQueryString()
            ]);
    }

    public function show(Product $product)
    {
        $location = $product->shop->location;
        return view('products.show', [
            'product' => $product,
            'location' => $location
        ]);
    }

    public function create(Owner $owner)
    {
        $shop = $owner->shop;
        $products = $shop->products;

        return view('owner.products.create',[
            'products' => $products,
            'shop' => $shop,
            'owner' => $owner,
        ]);
    }


}
