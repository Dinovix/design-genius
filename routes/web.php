<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

/**
 *  Website Routes
 */
Route::get('/', function () {
    return Inertia::render('Welcome', [
    ]);
})->name("web.home");

Route::get('/services', function () {
    return Inertia::render('Services', [
    ]);
})->name("web.services");

Route::get('/products', function () {
    return Inertia::render('Products', [
    ]);
})->name("web.products");

Route::get('/blog', function () {
    return Inertia::render('Blog', [
    ]);
})->name("web.blog");

Route::get('/affiliates', function () {
    return Inertia::render('Affiliates', [
    ]);
})->name("web.affiliates");

Route::get('/contact', function () {
    return Inertia::render('Contact', [
    ]);
})->name("web.contact");

/**
 *  !Website Routes
 */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/admin/users', function () {
        return Inertia::render('Users.Show');
    })->name('users');
});
