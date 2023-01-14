<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('posts');
});

Route::get('posts/{ post }', function ($slug){

//
    if (! file_exists($path = __DIR__ ."/../resources/posts/{{ $slug }}.html")){
       return redirect('/');
    }

    $post = cache()->remember("posts.{ $slug}", 5,function() use ($path){
        var_dump('file_get_contents');
       return  file_get_contents($path);
    });
    return view('post', [
        'post' => $post
    ]);

})-> where('post', '[A-z_\-]+');
