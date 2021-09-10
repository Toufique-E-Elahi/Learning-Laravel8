<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
//    protected $fillable=[''];

    protected $guarded=[];
//    protected $with=['category', 'author'];  // this line is equivalent to the with(['category', 'author']) or load(['category', 'author']) in Controller/web.php

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(
                fn($query)=> $query->where('title', 'like', '%'.$search.'%' )
                ->orWhere('body', 'like', '%'.$search.'%' )
            ));

        $query->when($filters['category'] ?? false, fn($query, $category) =>
        $query->whereHas('category', fn($query)=>// WhereHas('category') is used instead of whereExists() and here 'category'=> refers to the relationship method category(). which reduce complexity
        $query->where('categories.slug', $category))
        );
//// start==> Same functioning is performed above with whereHas() instead of whereExists()
//        $query->when($filters['category'] ?? false, fn($query, $category) =>
//            $query->whereExists(fn($query)=>$query->from('categories')->
//                whereColumn('categories.id', 'posts.category_id')->
//            where('categories.slug', $category))
//        );
//// end==> Same functioning is performed above with whereHas() instead of whereExists()

        $query->when($filters['author'] ?? false, fn($query, $author) =>
        $query->whereHas('author', fn($query)=>// WhereHas('category') is used instead of whereExists() and here 'category'=> refers to the relationship method category(). which reduce complexity
        $query->where('users.name', $author))
        );

//        //start--> same thing we can do with query->when() // see below/above
//        if($filters['search'] ?? false)
//            //[[ $filters['search'] ?? false]] ==> same as isset($filters['search']) ? true :false
//        {
//            $query->where('title', 'like', '%'.request('search').'%' )
//                ->orWhere('body', 'like', '%'.request('search').'%' );
//        }
//        //end--> same thing we can do with query->when() // see below/above
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
