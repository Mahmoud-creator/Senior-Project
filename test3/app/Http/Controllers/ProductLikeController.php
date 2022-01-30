<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductLikeController extends Controller
{


    public function store(Product $product){
        if($product->likedBy(request()->user())){
            return back()->with('stop','You have already upvoted this product!');
        }
        $product->likes()->create([
            'user_id' => request()->user()->id,
        ]);
        return back();
    }
}
