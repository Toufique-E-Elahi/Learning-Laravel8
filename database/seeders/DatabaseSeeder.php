<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        Post::truncate();
//        User::truncate();
//        Category::truncate();


         $user= User::factory()->create();
//         Category::factory(5)->create();
         Post::factory(5)->create([
             'user_id' => $user->id,
         ]);



//         $work= \App\Models\Category::create([
//             'name'=> 'work',
//             'slug'=> 'work',
//
//         ]);
//         $sports= \App\Models\Category::create([
//             'name'=> 'sports',
//             'slug'=> 'sports',
//
//         ]);
//         $health= \App\Models\Category::create([
//             'name'=> 'health',
//             'slug'=> 'health',
//
//         ]);
//
//         \App\Models\Post::create([
//             'user_id'=>$user->id,
//             'category_id'=>$health->id,
//             'title'=> '1st Article',
//             'slug' => '1st-blog',
//             'excerpt'=> 'Lorem Ipsum is simply dummy text',
//             'body' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>',
//         ]);
//         \App\Models\Post::create([
//             'user_id'=>$user->id,
//             'category_id'=>$sports->id,
//             'title'=> '2nd Article',
//             'slug' => '2nd-blog',
//             'excerpt'=> 'Lorem Ipsum is simply dummy text',
//             'body' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>',
//         ]);
//         \App\Models\Post::create([
//             'user_id'=>$user->id,
//             'category_id'=>$work->id,
//             'title'=> '3rd Article',
//             'slug' => '3rd-blog',
//             'excerpt'=> 'Lorem Ipsum is simply dummy text',
//             'body' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>',
//         ]);
    }
}
