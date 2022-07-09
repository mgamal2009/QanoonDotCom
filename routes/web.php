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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/clients',function (){
        return view('dashboard.clients');
    })->name('clients');
    Route::get('/articles',function (){
        return view('dashboard.articles');
    })->name('articles');
    Route::get('/books',function (){
        return view('dashboard.books');
    })->name('books');
    Route::get('/categories',function (){
        return view('dashboard.categories');
    })->name('categories');
    Route::get('/courses',function (){
        return view('dashboard.courses');
    })->name('courses');
    Route::get('/deliveryCities',function (){
        return view('dashboard.delivery-cities');
    })->name('delivery-cities');
    Route::get('/services',function (){
        return view('dashboard.services');
    })->name('services');

});
