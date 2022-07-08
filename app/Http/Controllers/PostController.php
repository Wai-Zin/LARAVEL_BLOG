<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;




class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        //dd($posts);
        //echo "This is Die";

    //    return view('posts.index',[
    //     'posts'=> $posts;
    //    ]);
       return view ('posts.index',compact('posts'));
    }

    public function create() {
        return view ('posts.create');
    }

    public function store() {
        // $post = new Post;
        // $post->title = "Second Post";
        // $post->body =   "Second Body";
        // $post->created_at =now();
        // $post->updated_at= now();
        // $post->save();
        // return "Create Post";

        //return "This is Store Method";

        //$request = request()->all();
        //dd($request);
        $post = new Post;
         $post->title = request('title');
         $post->body =  request('body');
         $post->created_at =now();
         $post->updated_at= now();
         $post->save();
         return redirect('/posts');

    }
    public function edit($id) {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update($id) {
        $post=Post::find($id);
        $post->title = "Changed Title";
        $post->body = "Changed body";
        $post->save();
        return "Post Updated";
    }

    public function show($id) {
        $post = Post::find($id);
        return view('posts.show' , compact('post'));
    }

    public function destroy($id) {
        Post::destroy($id);
        //$post = Post::find($id);
        //$post->delete();
        return "Deleted Post";
    }

}
