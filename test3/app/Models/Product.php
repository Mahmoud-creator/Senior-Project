<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, fn($query, $search) => $query->where(fn($query) => $query
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
        ));

        $query->when($filters['category'] ?? false, fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('slug', $category)
        )
        );

        $query->when($filters['filter'] ?? false, function ($query, $filter) {
            if($filter == 2){
                return $query->where(fn($query) => $query
                    ->where('is_verified', '=', 0)
                );
            }elseif($filter == 1){
                return $query->where(fn($query) => $query
                    ->where('is_verified', '=', 1)
                );
            }else{
                return 0;
            }
        });


    }

}
