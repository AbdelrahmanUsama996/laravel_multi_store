<?php

use App\Http\Controllers\ProfileController;
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
//Public Rout
Route::get('/', 'App\Http\Controllers\PublicWebsiteController@index');
Route::get('/store/{id}/product', 'App\Http\Controllers\PublicWebsiteController@index2');
Route::get('/product/purchase/done', 'App\Http\Controllers\PublicWebsiteController@store');
Route::get('/product/purchase/{id}', 'App\Http\Controllers\PublicWebsiteController@index3');

//Store Rout
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')
->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/store/create', 'App\Http\Controllers\DashboardController@create')
            ->middleware(['auth', 'verified']);
Route::post('/dashboard/store/store', 'App\Http\Controllers\DashboardController@store')
            ->middleware(['auth', 'verified']);
Route::post('/dashboard/store/update/{id}', 'App\Http\Controllers\DashboardController@update')
            ->middleware(['auth', 'verified']);
Route::get('/dashboard/store/edit/{id}', 'App\Http\Controllers\DashboardController@edit')
            ->middleware(['auth', 'verified']);
Route::post('/dashboard/store/delete/{id}', 'App\Http\Controllers\DashboardController@destroy')
            ->middleware(['auth', 'verified']);
//Product Rout
Route::get('/dashboard/product','App\Http\Controllers\ProductController@index')
            ->middleware(['auth', 'verified']);
Route::get('/dashboard/product/create', 'App\Http\Controllers\ProductController@create')
            ->middleware(['auth', 'verified']);
Route::post('/dashboard/product/store', 'App\Http\Controllers\ProductController@store')
            ->middleware(['auth', 'verified']);
Route::post('/dashboard/product/update/{id}', 'App\Http\Controllers\ProductController@update')
            ->middleware(['auth', 'verified']);
Route::get('/dashboard/product/edit/{id}', 'App\Http\Controllers\ProductController@edit')
            ->middleware(['auth', 'verified']);
Route::post('/dashboard/product/delete/{id}', 'App\Http\Controllers\ProductController@destroy')
            ->middleware(['auth', 'verified']);

//Transaction Rout

Route::get('/dashboard/transactions','App\Http\Controllers\TransactionController@index')
->middleware(['auth', 'verified']);

Route::post('/product/transactions/store','App\Http\Controllers\TransactionController@store')
->middleware(['auth', 'verified']);

Route::post('dashboard/transaction/delete/{id}','App\Http\Controllers\TransactionController@destroy')
->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
