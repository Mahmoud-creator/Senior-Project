<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        if (auth()->user()->email !== 'm@g.com'){
            return abort(403, 'Unauthorized action.');
        }
        return view('/admin.index', [
            'shops' => Shop::all()
        ]);
    }

    public function products(){
        if (auth()->user()->email !== 'm@g.com'){
            return abort(403, 'Unauthorized action.');
        }
        return view('/admin.products', [
            'products' => Product::all()
        ]);
    }

    public function comments(){
        if (auth()->user()->email !== 'm@g.com'){
            return abort(403, 'Unauthorized action.');
        }
        return view('/admin.comments', [
            'comments' => Comment::all()
        ]);
    }

    public function confirm(Shop $shop){

        if (auth()->user()->email !== 'm@g.com'){
            return abort(403, 'Unauthorized action.');
        }
        return view('admin.index', [
            'shops' => Shop::all(),
            'chosenShop' =>  $shop
        ]);
    }

    public function confirmP(Product $product){

        if (auth()->user()->email !== 'm@g.com'){
            return abort(403, 'Unauthorized action.');
        }
        return view('admin.products', [
            'products' => Product::all(),
            'chosenProduct' =>  $product
        ]);
    }

    public function destroy(Shop $shop){
        if (auth()->user()->email !== 'm@g.com'){
            return abort(403, 'Unauthorized action.');
        }
        $shop->delete();
        $owner = $shop->owner;
        $owner->delete();
        return redirect('/admin/dashboard')->with('success','Shop Deleted!');
    }

    public function destroyP(Product $product){
        if (auth()->user()->email !== 'm@g.com'){
            return abort(403, 'Unauthorized action.');
        }
        $product->delete();
        return redirect('/admin/products')->with('success','Product Deleted!');
    }
}
