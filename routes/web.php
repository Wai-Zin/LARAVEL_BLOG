<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

use App\Http\Controllers\RegisterController;

use App\Http\Controllers\LoginController;




// Route::get('uri,'callback function,anonymous function,closure' () {
// return or view()
// });

Route::get('/', function () {
    return view('welcome');
});

// Route::get('home',function () {
//     $name = "wai zin";
//     $colors = ['red', 'green','blue'];
//     $message = "<i> This is a message</i>";
//     return view('pages/home',compact('name','colors','message'));
// });

// Route::get('home',function () {
//     return view('home', [
//         'name' => 'Mg Mg';
//     ]);
// });

// Route::get('home',function () {
//     $name = "Kyaw Kyaw";
       //return view('home', [
//         'name' => $name;
//     ]);
// });
//Route::get('/',[App\Http\Controllers\PostController::class,'index']);

//  Route::get('/',[PostController::class,'index']);

 Route::redirect('/','posts');

//  Route::get('welcome', function() {
//     return view('welcome');
//  });
 Route::view('welcome', 'welcome');
 Route::get('welcome/{name}', function($name) {
    return "Hello $name";
 });

 Route::get('/posts',[PostController::class,'index'])->name('post_home');
 Route::get('/posts/create',[PostController::class,'create'])->middleware('myauth');
 Route::get('/post-show',[PostController::class,'show'])->middleware('myauth');
 Route::post('/posts',[PostController::class,'store'])->middleware('myauth');
 Route::get('/posts/{id}/edit',[PostController::class,'edit'])->middleware('myauth');
 Route::get('/posts/{id}',[PostController::class,'show'])->middleware('myauth');
 Route::put('/posts/{id}',[PostController::class,'update'])->middleware('myauth');
 Route::delete('/posts/{id}',[PostController::class,'destroy'])->middleware('myauth');

//  Route::prefix('posts')->middleware('myauth')->group(function(){
//     Route::get('/',[PostController::class,'index'])->name('post_home');
//     Route::get('/create',[PostController::class,'create']);
//     Route::get('/show',[PostController::class,'show']);
//     Route::post('',[PostController::class,'store']);
//     Route::get('/{id}/edit',[PostController::class,'edit']);
//     Route::get('/{id}',[PostController::class,'show']);
//     Route::put('/{id}',[PostController::class,'update']);
//     Route::delete('/{id}',[PostController::class,'destroy']);

//  });



// Route::resource('/posts',PostController::class);

Route::get('master',function() {
    return view('layouts.master');
});

Route::get('register', [RegisterController::class, 'create' ]);
Route::post('register', [RegisterController::class, 'store' ]);

Route::get('login', [LoginController::class, 'create' ]);
Route::post('login', [LoginController::class, 'store' ]);

Route::get('/', [PostController::class, 'index' ]);
Route::get('logout', [LoginController::class, 'destroy' ]);


