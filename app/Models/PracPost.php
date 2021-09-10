<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class PracPost
{

    public $title;
    public $excerpt;
    public $body;
    public $date;
    public $slug;
    public function __construct( $title, $excerpt, $date, $slug, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;

        $this->date = $date;
        $this->slug = $slug;
        $this->body = $body;

    }

    public static function all()
    {

        $files= \Illuminate\Support\Facades\File::files(resource_path("post"));

//    $posts=[]; //needed only for working with foreach block.not for collect and array_map()


        //same function of foreach block with Laravel Collection(mapping twice)

        return cache()->rememberForever('posts.all', function ()use ($files){
            return collect($files)->map(function ($file){
                return \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);})->map(function ($doc){
                return new \App\Models\PracPost(
                    $doc->title,
                    $doc->excerpt,
                    $doc->date,
                    $doc->slug,
                    $doc->body()

                );
            })->sortByDesc('date');
        });

        //same function of foreach block with Laravel Collection(mapping once)

//        return collect($files)->map(function ($file){
//            $doc = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
//            return new \App\Models\PracPost(
//                $doc->title,
//                $doc->excerpt,
//                $doc->date,
//                $doc->slug,
//                $doc->body()
//
//            );
//
//        });


        //same function of foreach block with array_map()

//
//    $posts= array_map(function ($file){
//        $doc = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
//        return new \App\Models\PracPost(
//            $doc->title,
//            $doc->excerpt,
//            $doc->date,
//            $doc->slug,
//            $doc->body()
//
//        );
//
//    },$files);

        //same function of this below loop block is implemented with 2 different approach array_map() and Laravels colection

//    foreach($files as $file)
//    {
//        $doc = \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file);
//        $posts[]= new \App\Models\PracPost(
//            $doc->title,
//            $doc->excerpt,
//            $doc->date,
//            $doc->slug,
//            $doc->body()
//
//        );
//
//
//    }
//    dd($posts);


// array_map() practice start

//       dd(File::files(resource_path("/post/")));


//        $files= File::files(resource_path("/post/"));
//
//        return array_map(function ($file){
//           return $file->getContents();
//        }, $files);

        // array_map() practice end




    }


    public static function find($slug)
    {

        //of all blogs, find the one which has a particular slug match

        $posts= static::all();
        return $posts->firstWhere('slug', $slug);




        //start initial way of practice
//        $path = __DIR__ . "/../resources/post/{$slug}.html";
//        $path = resource_path("/post/{$slug}.html");
//
//        if (!file_exists($path))
//        {
////        abort(404);
////        dd("not exist ");
////            return redirect('/posts');
//            throw new ModelNotFoundException();
//
//        }
//
//        return cache()->remember("post.{slug}", 5, function ()use($path){
//
//            return file_get_contents($path);
//        });


        //end initial way of  practice
    }

    public static function findorfail($slug)
    {
        $posts= static::find($slug);
        if (!$posts)
        {
            throw new ModelNotFoundException();
        }

        return $posts;
    }
}
