<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Post;
use App\Models\PracPost;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/newsletter', NewsletterController::class);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])
    ->where('post', '[1-9A-z_\-]+');

Route::get('/admin/posts/create', [PostController::class,'create'])->middleware('admin');

Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

////start==>this filtering by category is performed through the Post::class() model's scopeFiltering Method
//Route::get('/categories/{category:slug}', function (\App\Models\Category $category) {
//
//    return view('posts',
//        [
//            'posts' => $category->posts->load('category', 'author'),
//            'categories'=> \App\Models\Category::all(),
//            'currentCategory'=> $category,
//
//        ]);
//
//});
////end==> this filtering by category is performed through the Post::class() model's scopeFiltering Method

////start=> this filtering by author is performed through the Post::class() model's scopeFiltering Method
//Route::get('/authors/{author:name}', function (\App\Models\User $author) {
//    return view('posts',
//        [
//            'posts' => $author->posts->load('category', 'author'),
//        ]);
//
//});
////end=> this filtering by author is performed through the Post::class() model's scopeFiltering Method




// start some basic but important things for learning purpose with the PracPost Model

Route::get('/pposts', function () {
    return view('posts', [
        'posts' =>  \App\Models\PracPost::all()
    ]);
});
Route::get('/pposts/{post}', function ($slug) {

    // find a post by its slug and pass it to a view named post

    $post= \App\Models\PracPost::findorfail($slug);


    return view('post',
        [
            'post' => $post
        ]);

    //same operation move these below code into PracPost Model
//    $path = __DIR__ . "/../resources/post/{$slug}.html";
//
//    if (!file_exists($path))
//    {
////        abort(404);
////        dd("not exist ");
//        return redirect('/posts');
//    }
//
//    $post= cache()->remember("post.{slug}", 5, function ()use($path){
//
////        var_dump("Hello");
//        return file_get_contents($path);
//    });


//    return view('post',
//    [
//        'post' => $post
//    ]);
})->where('post', '[1-9A-z_\-]+');

// end some basic but important things for learning purpose with the PracPost Model


