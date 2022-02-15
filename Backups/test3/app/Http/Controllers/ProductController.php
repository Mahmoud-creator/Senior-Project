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
                ->paginate(6)->withQueryString()
            ]);
    }

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product
        ]);
    }

    public function create(Owner $owner)
    {
        return view('admin.products.create',[
            'owner' => $owner
        ]);
    }


}
