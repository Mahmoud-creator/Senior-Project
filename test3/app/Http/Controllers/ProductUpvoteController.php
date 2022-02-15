<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Upvote;
use Illuminate\Http\Request;

class ProductUpvoteController extends Controller
{
    public function store(Product $product)
    {

        if (auth()->user() === null or auth('owner')->user() !== null) {
            return back()->with('stop', 'You can not upvote or verify products if you are not signed in as user!');
        }



        if ($product->upvotedBy(request()->user())->count()) {
            return back()->with('stop', 'You have already upvoted this product!');
        }

        $product->upvotes()->create([
            'user_id' => request()->user()->id,
        ]);

        return back();
    }
}





