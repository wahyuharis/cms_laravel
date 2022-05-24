<?php

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ImagesController;
use App\Http\Controllers\admin\PasswordController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\TagsController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FrontAboutController;
use App\Http\Controllers\FrontContactController;
use App\Http\Controllers\FrontHomeController;
use App\Http\Controllers\FrontPostController;
use App\Http\Controllers\HashPassGenerateController;
use App\Http\Middleware\NativeLogin;
use App\Http\Middleware\NativeLoginAdmin;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//start-frontend
Route::get('/', [FrontHomeController::class, 'index']);
Route::get('/home/', [FrontHomeController::class, 'index']);
Route::get('/about/', [FrontAboutController::class, 'index']);
Route::get('/post/', [FrontPostController::class, 'index']);
Route::get('/contact/', [FrontContactController::class, 'index']);
Route::get('/post/detail/{slug}', [FrontPostController::class, 'detail_post']);

Route::post('/post/search/', [FrontPostController::class, 'search']);



//end-frontend

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login/submit', [AuthController::class, 'login_submit']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::middleware([NativeLogin::class])->group(function () {
    Route::get('admin', [HomeController::class, 'index']);

    //category
    Route::get('admin/category', [CategoryController::class, 'index']);
    Route::get('admin/category/datatables', [CategoryController::class, 'datatables']);
    Route::get('admin/category/add/', [CategoryController::class, 'edit']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::post('admin/category/submit', [CategoryController::class, 'submit']);

    //tags
    Route::get('admin/tags', [TagsController::class, 'index']);
    Route::get('admin/tags/datatables', [TagsController::class, 'datatables']);
    Route::get('admin/tags/add/', [TagsController::class, 'edit']);
    Route::get('admin/tags/edit/{id}', [TagsController::class, 'edit']);
    Route::get('admin/tags/delete/{id}', [TagsController::class, 'delete']);
    Route::post('admin/tags/submit', [TagsController::class, 'submit']);

    //password
    Route::get('admin/password', [PasswordController::class, 'index']);
    Route::post('admin/password/submit', [PasswordController::class, 'submit']);

    //post
    Route::get('admin/post', [PostController::class, 'index']);
    Route::get('admin/post/datatables', [PostController::class, 'datatables']);
    Route::get('admin/post/edit/{id}', [PostController::class, 'edit']);
    Route::get('admin/post/add/', [PostController::class, 'edit']);
    Route::get('admin/post/delete/{id}', [PostController::class, 'delete']);
    Route::post('admin/post/submit/', [PostController::class, 'submit']);

    //images
    Route::get('admin/images', [ImagesController::class, 'index']);
    Route::post('admin/images/upload/', [ImagesController::class, 'upload']);
    Route::get('admin/images_list', [ImagesController::class, 'images_list']);


    Route::middleware([NativeLoginAdmin::class])->group(function () {
        Route::get('admin/user', [UserController::class, 'index']);
        Route::get('admin/user/datatables', [UserController::class, 'datatables']);
        Route::get('admin/user/edit/{id}', [UserController::class, 'edit']);
        Route::get('admin/user/add', [UserController::class, 'edit']);
        Route::post('admin/user/submit', [UserController::class, 'submit']);
    });
});



Route::get('/genpass', [HashPassGenerateController::class, 'index']);
