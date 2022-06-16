<?php

use Illuminate\Support\Facades\Route;

//Frontend Imports
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;

//Admin Imports
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;


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

//FRONTEND
Route::get('/', [FrontendController::class, 'index']);
Route::get('category', [FrontendController::class, 'category']);
Route::get('view-category/{slug}', [FrontendController::class, 'viewCategory']);
Route::get('category/{catSlug}/{prodSlug}', [FrontendController::class, 'viewProduct']);

Route::get('product-list', [FrontendController::class, 'listSearchProduct']);
Route::get('/faq', [FrontendController::class, 'faq']);
Route::post('search-product', [FrontendController::class, 'searchProduct']);



Auth::routes();

Route::get('load-cart-data', [CartController::class, 'cartCounter']);
Route::get('load-wishlist-data', [WishlistController::class, 'wishlistCounter']);

//redirección cuando se registra
Route::get('/home', [FrontendController::class, 'index'])->name('index');

Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart', [CartController::class, 'updateCart']);

Route::post('add-to-wishlist', [WishlistController::class, 'addWishlist']);
Route::post('delete-wishlist-item', [WishlistController::class, 'deleteWishItem']);


Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [CheckOutController::class, 'index']);
    Route::post('place-order', [CheckOutController::class, 'placeOrder']);
    Route::post('save-profile', [UserController::class, 'saveProfile']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);
    Route::get("download-pdf/{id}", [OrderController::class, 'downloadPDF']);

    Route::get('my-profile', [FrontendController::class, 'profile']);
   
    Route::get('wishlist', [WishlistController::class, 'index']);
});

//FIN FRONTEND

//ADMIN
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Admin\FrontendController@index');

    //Categorías
    Route::get('categories', 'App\Http\Controllers\Admin\CategoryController@index');
    Route::get('add-category', 'App\Http\Controllers\Admin\CategoryController@add');
    Route::post('insert-category', 'App\Http\Controllers\Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);
   
    //Productos
    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product', [ProductController::class, 'insert']);

    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);
    
    //Pedidos
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrderController::class, 'view']);
    Route::put('update-order/{id}', [OrderController::class, 'updateOrder']);
    Route::get('order-history', [OrderController::class, 'orderHistory']);
    
    //Usuarios
    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewUsers']);

   
});

//FIN ADMIN