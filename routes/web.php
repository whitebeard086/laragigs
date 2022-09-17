<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

// Routing and Responses

// Route::get('/hello', function() {
//     return 'Hello World';
// });

// Route::get('/hello', function() {
//     return response('<h1>Hello World</h1>');
// });

// Route::get('/hello', function() {
//     return response('<h1>Hello World</h1>', 200)
//         ->header('Content-Type', 'text/plain');
// });

// adding custom header
Route::get('/hello', function() {
    return response('<h1>Hello World</h1>', 200)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

// Wildcard Endpoints

// In this case, the id is getting passed in as a wildcard
Route::get('/posts/{id}', function($id){
    return response('Post ' . $id);
});

// If you don't want the wildcard to include letters and symbols
Route::get('/posts/{id}', function($id){
    return response('Post ' . $id);
})->where('id', '[0-9]+');

// Die Dump Helpers

// Some helper methods for debugging and showing values
Route::get('/posts/{id}', function($id){
    dd($id);
    return response('Post ' . $id);
})->where('id', '[0-9]+');

// Die Dump and Debug
// Offers more info than dd
Route::get('/posts/{id}', function($id){
    ddd($id);
    return response('Post ' . $id);
})->where('id', '[0-9]+');

// Request and Query Params

// getting the values of your request
Route::get('/search', function(Request $request) {
    return $request->name . ' ' . $request->city;
});