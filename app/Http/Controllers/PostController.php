<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class PostController extends Controller
{
    public function index() {
        // $posts = Post::all();
        //$posts = Post::paginate(4);
        //dd($posts);
        //echo "This is Die";

    //    return view('posts.index',[
    //     'posts'=> $posts;
    //    ]);
      $posts = Post::select('posts.*','users.name')->join('users', 'users.id', '=', 'posts.user_id')->paginate(3);
    //  $posts = DB::table('posts')->join('users','users.id','=','posts.user_id')->get();

       return view ('posts.index',compact('posts'));

    // $user = Auth::user();
    // dd($user);
    // if (Auth::check()) {
    //     return 'Logged in';
    // }else {
    //     return 'Not logged in';
    // }
    }

    public function create() {
        return view ('posts.create');
    }

    public function store(Request $request) {

    //    $validator =  Validator::make($request -> all() , [
    //         'title' => 'required',
    //         'body' => 'required'
    //     ]);
    //     if($validator->fails()) {
    //         return redirect('posts/create')->withErrors($validator);
    //      } else {
    //         return "Validation success";
    //     }


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

        //Validate
        // $request -> validate([
        //     'title' => 'required',
        //     'body' => 'required|min:5'
        // ],[
        //     'title.required' =>'ခေါင်းစဉ်ထည့်ပါ',
        //     'body.required' => 'အကြောင်းအရာထည့်ပါ',
        //     'body.min' => 'အနည်းဆုံး၅လုံးထည့်ပါ'
        // ]);

        $post = new Post;
        //  $post->title = request('title');
        //  $post->body =  request('body');
         $post -> title = $request -> title;
         $post -> body = $request -> body;
         $post->created_at =now();
         $post->updated_at= now();
         $post->save();
         return redirect('/posts');

    }
    public function edit($id) {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request,$id) {

       // $this->myValidate($request);
    //    $request-> validate([
    //     'title' => 'required',
    //     'body' => 'required'
    //    ],[
    //     'title.required' =>'ခေါင်းစဉ်ထည့်ပါ',
    //     'body.required' => 'အကြောင်းအရာထည့်ပါ',
    //     'body.min' => 'အနည်းဆုံး၅လုံးထည့်ပါ'
    // ]);

        $post=Post::find($id);
        // $post->title = request('title');
        // $post->body = request('body');
        $post->title = $request-> title;
        $post->body = $request->body;
        $post->updated_at=now();
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
        //return "Deleted Post";
        return redirect('/posts');
    }

   // public function myValidate($request) {
        // $request-> validate([
        //     'title' => 'required',
        //     'body' => 'required'
        //    ],[
        //     'title.required' =>'ခေါင်းစဉ်ထည့်ပါ',
        //     'body.required' => 'အကြောင်းအရာထည့်ပါ',
        //     'body.min' => 'အနည်းဆုံး၅လုံးထည့်ပါ'
        // ]);
   // }

}
