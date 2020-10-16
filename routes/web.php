<?php

use Illuminate\Support\Facades\Route;

//add controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;


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


// Route::get('/home','HomeController@index'); laravel 7

Route::get('/home', [HomeController::class, 'index']); //laravel 8


// Route:: get('/user',function(){
//     return view('user',[
//         'name' => 'Kanit Wijitpanya',
//         'desc' => 'Description of Kanit'
//     ]);
// });

// Route:: get('/user',function(){
//     return view('user')->with([
//         'name' => 'Kanit Wijitpanya',
//         'desc' => 'Description of Kanit'
//         ]);
// });

// Route:: get('/user',function(){
//     $name = "Kanit Wijitpanya";
//     $desc = "Description of Kanit 9";
//     return view('user',compact('name','desc')); // create array send view
// });

Route:: get('user/{id}',function($id){
    $name = "Kanit Wijitpanya";
    $desc = "Description of Kanit 9";

    //helper fn user/1444?name=Node
    $name = request('name');
    return view('user',compact('name','desc','id')); // create array send view
});

//optional route
// Route::get('post/{slug?}', function ($slug = null) {
//     return $slug;
// });

Route::get('/post/{slug}', [PostController::class, 'show']);


Route::get('/node',function(){
    return 'Hello node';
});

// Route For Multiple Verbs

Route::match(['get', 'post'], '/user/profile', function () {
    return 'profiles';
});

// Route Parameters
Route::any('users/{id}', function ($id) {
    return "Hi user : {$id}";
});

Route::get('users/{id}/info/{age}', function ($id,$age) {
    return "user id {$id} Age: {$age}";
});

Route::get('book/{name?}', function ($name = null) {
    return $name;
});


// Regular Expression Constraints
Route::get('animal/{name?}', function ($name = null) {
    return "Animal name : $name";
})
->where('name','[A-Za-z]+');

Route::get('people/{id}', function ($id) {
    return $id;
})
->where('id','[0-9]+');

Route::get('users/{id}/{name}', function ($id,$name) {
    return "user id: {$id} , name: {$name}";
})
->where(['id'=>'[0-9]+','name'=>'[a-z]+']);

Route::view('/welcome', 'welcome', ['name' => 'Taylor']);


