<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function owner(){
        return $this->belongsTo(Owner::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function location(){
        return $this->hasOne(Location::class);
    }

}
