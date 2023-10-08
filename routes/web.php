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
Route::get('/test', function () {
    return currentUserPermissions();
});

Route::get('/home', function () {
    return view('layouts.app');
})->middleware('auth')->name('home');

Route::group(['prefix' => 'academics', 'middleware' => ['auth', 'permission:terms-update']], function () {
    Route::get('/terms', \App\Http\Livewire\Terms::class)->name('academics.terms');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/settings', \App\Http\Livewire\Settings::class)->name('settings');
});

Route::group(['prefix' => 'superadmin', 'middleware' => ['auth', 'role:superadmin']], function () {
    Route::get('/tenants', \App\Http\Livewire\Tenants::class)->name('tenants');
});