<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductConfirmController extends Controller
{
    public function store(Product $product)
    {

        if (auth()->user() === null or auth('owner')->user() !== null) {
            return back()->with('stop', 'You can not upvote or verify products if you are not signed in as user!');
        }

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
