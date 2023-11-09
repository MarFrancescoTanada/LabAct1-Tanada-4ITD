<?php

use App\Http\Controllers\CategoryController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $users = DB::table('users')->select('id','name','email','created_at')->get();
        return view('dashboard',compact('users'));
    })->name('dashboard');
});

// Route::get('/category', function () {
//     $categories = DB::table('categories')->select('category_name','user_id','updated_at','created_at','deleted_at')->get();

//     return view('admin.category.category',compact('categories'));
// })->name('AllCat');

Route::get('/all/category', [CategoryController::class,'viewCategory'])->name('AllCat');
Route::get('/addCategory', [CategoryController::class,'newCategoryPage'])->name('newCategoryForm');
Route::post('addCategory', [CategoryController::class,'addCategory'])->name('newCategory');