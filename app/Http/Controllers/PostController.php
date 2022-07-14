<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use  App\Http\Requests\PostRequest;



class PostController extends Controller
{
    public function index() {


        // $posts = Post::all();
        $posts = Post::paginate(4);
        //dd($posts);
        //echo "This is Die";

    //    return view('posts.index',[
    //     'posts'=> $posts;
    //    ]);
      $posts = Post::select('posts.*','users.name as author')
      ->join('users', 'users.id', '=', 'posts.user_id')
      ->orderby('id', 'desc')
      ->paginate(3);     //->simplePaginate();
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

    public function store(PostRequest $request) {

      $validator =  Validator::make($request -> all() , [
            'title' => 'required',
            'body' => 'required'
        ]);

        // if($validator->fails()) {
        //   return redirect('posts/create')->withErrors($validator);
        //  } else {
        //     return "Validation success";
        //  }
        if($validator->fails()) {
            return redirect('/posts/create')
            ->withErrors($validator)
            ->withInput();
        }

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

        // $post = new Post;
        // //  $post->title = request('title');
        // //  $post->body =  request('body');
        //  $post -> title = $request -> title;
        //  $post -> body = $request -> body;
        //  $post->created_at =now();
        //  $post->updated_at= now();
        //  $post->save();
       // Post::create($request -> only(['title', 'body']));
       Post::create([
        'title' => $request -> title,
        'body' => $request->body,
        'user_id' => auth()->id(),
       ]);
         return redirect('/posts')->with('success' , 'A post was created successfully.');

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
       // $post = Post::find($id);
        $post = Post::select(['posts.*','users.name as author'])
        ->join('users','users.id','posts.user_id')
        ->where('posts.id',$id)     //->find()->toSql();
        ->first();
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
