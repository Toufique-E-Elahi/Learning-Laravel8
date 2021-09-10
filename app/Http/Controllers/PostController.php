<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        //start debugging  {Later we will do this by clockwork package}
//    \Illuminate\Support\Facades\DB::listen(function ($query)
//    {
////        \Illuminate\Support\Facades\Log::info($query->sql);
//        logger($query->sql, $query->bindings);
//
//    });
        //start debugging  {Later we will do this by clockwork package}


        return view('posts.index', [
//            'posts' =>  $this->getposts($post),
            'posts' =>  Post::latest()->with('category', 'author')
                ->filter(\request(['search', 'category', 'author']))->paginate(6)->withQueryString(),
        ]);

    }

    public function show(Post $post)
    {
        // find a post by its slug and pass it to a view named post

//    $post= \App\Models\Post::findorfail($id);

        return view('posts.show',
            [
                'post' => $post
            ]);
    }
//    protected function getposts($post)
//    {
//        if(request('search'))
//        {
//            $post->where('title', 'like', '%'.request('search').'%' )
//                ->orWhere('body', 'like', '%'.request('search').'%' );
//        }
//        return $post->get();
//    }
}
