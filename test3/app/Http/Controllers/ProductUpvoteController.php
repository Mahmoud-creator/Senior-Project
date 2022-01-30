<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Upvote;
use Illuminate\Http\Request;

class ProductUpvoteController extends Controller
{
    public function store(Product $product){
        if($product->upvotedBy(request()->user())->count()){
            return back()->with('stop','You have already upvoted this product!');
        }
        $product->upvotes()->create([
            'user_id' => request()->user()->id,
        ]);
        return back();
    }
}





