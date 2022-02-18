<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Owner;
use App\Models\Shop;

class OwnerRegisterController extends Controller
{
    public function create()
    {
        return view('register.owner-create');
    }

    public function store()
    {


        $attributes = request()->validate([
            'owner_name' => 'required|max:255',
            'owner_phone' => 'required|unique:owners,phone',
            'owner_email' => 'required|email|max:255|unique:owners,email',
            'shop_name' => 'required|max:255',
            'shop_phone' => 'required|unique:owners,phone',
            'shop_email' => 'required|email|max:255|unique:owners,email',
            'country' => 'required|max:255',
            'city' => 'required|max:255',
            'street' => 'required|max:255',
            'password' => 'required|max:255|min:7',
            'latitude' => 'required|between:-90,90',
            'longitude' => 'required|between:-180,180'
        ]);


        $owner = Owner::create([
            'name' => $attributes['owner_name'],
            'phone' => $attributes['owner_phone'],
            'email' => $attributes['owner_email'],
            'password' => bcrypt($attributes['password']),
        ]);

        $shop = Shop::create([
            'owner_id' => $owner->id,
            'name' => $attributes['shop_name'],
            'phone' => $attributes['shop_phone'],
            'email' => $attributes['shop_email'],
            'country' => $attributes['country'],
            'city' => $attributes['city'],
            'street' => $attributes['street'],
        ]);

        Location::create([
            'shop_id' => $shop->id,
            'location_name' => $attributes['street'].$attributes['city'].$attributes['country'],
            'longitude' => $attributes['longitude'],
            'latitude' => $attributes['latitude'],
        ]);

        auth('owner')->login($owner);
        return redirect('/owners:'.$owner->id.'/dashboard')->with('success','Your shop account has been created!');

    }
}
