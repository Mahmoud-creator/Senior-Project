<?php

namespace App\Http\Controllers;

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

    public function confirm(Shop $shop){

        if (auth()->user()->email !== 'm@g.com'){
            return abort(403, 'Unauthorized action.');
        }
        return view('admin.index', [
            'shops' => Shop::all(),
            'chosenShop' =>  $shop
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
}
