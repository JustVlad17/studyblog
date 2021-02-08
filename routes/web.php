<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminCategoryController;

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

/*
 * Route::get('/', function () {
 *     return view('welcome');
 * });
 */


Route::get('/about', function () {
    return view('web.static.about');
});

Route::match(['get', 'post'], '/foradmin/posts/createpost', [AdminPostController::class, 'createPost'])
    ->name('createpost');

Route::get('/', [PostController::class, 'showAllPosts'])->name('main');

Route::match(['get', 'post'], '/post/{id}', [PostController::class, 'showOnePost']);

Route::match(['get', 'post'], '/registration', [RegistrationController::class, 'regUser']);

Route::get('/test', function () {
    return view('test');
});

//Route::get('/test/check', [TestController::class, 'test']);

Route::post('/authorization', [AuthorizationController::class, 'authorization']);

Route::get('/logout', [AuthorizationController::class, 'logout']);

Route::get('/foradmin', function () {
    return view('web.foradmin');
});

Route::get('/foradmin/users', [AdminUserController::class, 'showAllUsers'])->name('users');

Route::get('/foradmin/users/deleteuser/{id}', [AdminUserController::class, 'deleteUser']);

Route::get('/foradmin/users/changerole/{id}', [AdminUserController::class, 'changeRole']);

Route::get('/foradmin/posts', function () {
    return view('web.static.forAdminPosts');
});

Route::get('/foradmin/posts/editpost', [AdminPostController::class, 'showAllPosts'])
    ->name('posts');

Route::delete('/foradmin/posts/editpost/delete/{id}', [AdminPostController::class, 'deletePost']);

Route::get('/foradmin/posts/editpost/redact/{id}', [AdminPostController::class, 'editPost']);

Route::get('/post/{post_id}/deletecomment/{comment_id}', [AdminCommentController::class, 'deleteComment']);

Route::get('/category/{id}', [PostController::class, 'showCategoryPosts']);

Route::get('/foradmin/categories', [AdminCategoryController::class, 'createCategory']);
