<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCommentsController extends Controller
{
    public function store(Product $product){

        request()->validate([
            'body' => 'required'
        ]);

        $product->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        return back();
    }

    public function destroy(Product $product,Comment $comment){
        if (auth()->user()->email !== "m@g.com"){
            return abort(403, 'Unauthorized action.');
        }
        $comment->delete();
        return redirect('products/'.$product->slug)->with('success','Comment Deleted!');
    }

}
