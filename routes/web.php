<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;



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
Route::get('/',[PostController::class,'index']);

Route::get('/posts',[PostController::class,'index']);
Route::get('/posts/create',[PostController::class,'create']);
//Route::get('/post-show',[PostController::class,'show']);
Route::post('/posts/store',[PostController::class,'store']);
Route::get('/posts/edit/{id}',[PostController::class,'edit']);
Route::get('/posts/show/{id}',[PostController::class,'show']);
Route::post('/posts/update/{id}',[PostController::class,'update']);
Route::get('/posts/delete/{id}',[PostController::class,'destroy']);