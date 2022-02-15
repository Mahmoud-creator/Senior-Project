<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductConfirmController extends Controller
{
    public function store(Product $product)
    {
        if($product->is_verified($product)){
            return back()->with('omit', 'This product is already verified!');
        }else{
            if ($product->confirmedBy(request()->user())->count()) {
                return back()->with('stop', 'You have already verified this product!');
            }
            $product->confirms()->create([
                'user_id' => request()->user()->id,
            ]);
            if($product->is_verified($product)){
                $product->update(['is_verified'=>1]);
            }
        }
        return back();
    }
}
