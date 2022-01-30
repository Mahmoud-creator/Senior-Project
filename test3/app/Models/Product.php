<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function upvotes()
    {
        return $this->hasMany(Upvote::class);
    }

    public function upvotedBy(User $user){
        return $this->upvotes()->where('user_id',$user->id);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likedBy(User $user){
        return $this->likes()->contains('user_id',$user->id);
    }




}
