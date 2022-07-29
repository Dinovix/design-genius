<?php

use App\Http\Controllers\Admin\AdvertController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\ImageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;

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
    return Inertia::render('Welcome', []);
})->name("web.home");

Route::get('/services', function () {
    return Inertia::render('Services', []);
})->name("web.services");

Route::get('/products', function () {
    return Inertia::render('Products', []);
})->name("web.products");

Route::get('/product/details/{product}', function ($product) {
    return Inertia::render('ProductDetails', compact("product"));
})->name("web.product_details");

Route::get('/blog', function () {
    return Inertia::render('Blog', []);
})->name("web.blog");

Route::get('/blog/content/{id}', function ($id) {
    return Inertia::render('BlogDetails', [
        "blog_id" => $id
    ]);
})->name("web.blog_details");

Route::get('/affiliates', function () {
    return Inertia::render('Affiliates', []);
})->name("web.affiliates");

Route::get('/contact', function () {
    return Inertia::render('Contact', []);
})->name("web.contact");

Route::get('/about', function () {
    return Inertia::render('About', []);
})->name("web.about");

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

    /**
     * Admin resources administration routes 
     */

    // users 
    Route::resource('/admin/users', UserController::class);
    Route::get('/admin/users', [UserController::class, 'index'])->name('users');

    // Products Categories
    Route::resource('/admin/categories', CategoryController::class);
    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('categories');

    // Products
    Route::resource('/admin/products', ProductController::class);
    Route::get('/admin/products', [ProductController::class, 'index'])->name('products');

    // Discount 
    Route::resource('/admin/discounts', DiscountController::class);
    Route::get('/admin/discounts', [DiscountController::class, 'index'])->name('discounts');

    // Orders
    Route::resource('/admin/orders', OrderController::class);
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders');

    // Adverts
    Route::resource('/admin/adverts', AdvertController::class);
    Route::get('/admin/adverts', [AdvertController::class, 'index'])->name('adverts');
    
    // BlogPosts
    Route::resource('/admin/blogposts', BlogController::class);
    Route::get('/admin/blogposts', [BlogController::class, 'index'])->name('blogposts');
    
    // Contacts
    Route::resource('/admin/contacts', ContactController::class);
    Route::get('/admin/contacts', [ContactController::class, 'index'])->name('contacts');
    
    // Admin Logs
    Route::resource('/admin/logs', LogController::class);
    Route::get('/admin/logs', [LogController::class, 'index'])->name('logs');

    // Images
    Route::get('/img/{path}', [ImageController::class, 'show'])
        ->where('path', '.*')
        ->name('image');

});

/**
 * API Routes
 */
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('webapi')->group(function () {
    });
});
