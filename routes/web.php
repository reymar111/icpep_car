<?php

use App\Models\Post;
use Illuminate\Support\Facades\Hash;
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

// routing
Route::get('/greetings', function() {
    return "Good afternoon participants. A pleasant afternoon to all :)";
});

Route::get('/greeting/{user}', function($user) {
    return "Magandang tanghali ".$user;
});

// hashing
Route::get('/hash/{value}', function($value) {
    return \Hash::make($value);
});

// auth routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// authentication
Route::get('profile', function() {
    return 'this is a for authenticated users only';
})->middleware(['auth']);

// blade templates
Route::resource('/posts', App\Http\Controllers\PostController::class);

// integrating laravel and vue
Route::get('all_posts', function() {
    $posts = Post::latest()->paginate(5);

    return view('posts.index')->with(compact('posts'));
})->name('all_posts');
