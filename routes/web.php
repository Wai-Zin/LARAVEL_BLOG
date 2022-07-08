<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('uri,'callback function,anonymous function,closure' () {
// return or view()
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',function () {
    $name = "wai zin";
    $colors = ['red', 'green','blue'];
    $message = "<i> This is a message</i>";
    return view('pages/home',compact('name','colors','message'));
});

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
