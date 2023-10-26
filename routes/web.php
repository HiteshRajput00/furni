<?php


use App\Http\Controllers\Admin\AddProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Blogcontroller;
use App\Http\Controllers\furnicontroller\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\furnicontroller\checkoutcontroller;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\editProductController;
use App\Http\Controllers\furnicontroller\ProductController;
use App\Http\Controllers\furnicontroller\usercontroller;
use App\Http\Controllers\furnicontroller\WishlistController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/furni/login', [usercontroller::class, 'login'])->name('login');
Route::get('/', [usercontroller::class, 'index'])->name('index');
Route::post('/store', [AdminController::class, 'store']);
Route::post('/log', [AdminController::class, 'log']);
//  admin routes
Route::group(['middleware' => 'Auth', 'admin'], function () {
  Route::get('/home', [AdminController::class, 'home'])->name('home');
  Route::get('/profile', [AdminController::class, 'profile']);
  Route::get('/adminlogout', [AdminController::class, 'adminlogout']);
  Route::get('/addblog', [Blogcontroller::class, 'addblog'])->name('addblog');
  Route::post('/saveblog', [Blogcontroller::class, 'saveblog'])->name('saveblog');
  Route::get('/bloglist', [Blogcontroller::class, 'bloglist'])->name('bloglist');
  Route::get('/add', [AddProductController::class, 'add']);
  Route::post('/savecoupon', [CouponController::class, 'savecoupon']);
  Route::get('/addcoupon', [CouponController::class, 'addcoupon'])->name('addcoupon');
  Route::post('/save', [AddProductController::class, 'save']);
  // Route::post('/variable', [ProductController::class, 'variable']);
  Route::get('/list', [AddProductController::class, 'list']);
  Route::get('/delete{id}', [editProductController::class, 'del'])->name('delete');
  Route::get('/edit{id}', [editProductController::class, 'edit'])->name('edit');
  Route::post('/update{id}', [editProductController::class, 'update'])->name('update');
  Route::get('/colour', [CategoryController::class, 'colour']);
  Route::get('/material', [CategoryController::class, 'material']);
  Route::get('/category', [CategoryController::class, 'category']);
  Route::post('/addcolour', [CategoryController::class, 'addcolour']);
  Route::post('/addmaterial', [CategoryController::class, 'addmaterial']);
 
  Route::post('/addfurniture', [CategoryController::class, 'addfurniture']);
 
  Route::get('/variation{vID}', [editProductController::class, 'editvariation'])->name('variation');
  Route::post('/savevar{id}', [editProductController::class, 'savevar'])->name('savevar');
});
//user protected route
Route::group(['middleware' => 'Auth'], function () {
  
  Route::get('/addcart/{id}', [CartController::class, 'addcart'])->name('shop.addcart');
  Route::get('/showcart', [CartController::class, 'showcart'])->name('showcart');
  Route::get('/delcart{Cid}', [CartController::class, 'delcart'])->name('delcart');
  Route::post('/addwishlist', [WishlistController::class, 'addwishlist'])->name('addwishlist');
  Route::post('/removewishlist', [WishlistController::class, 'removewishlist'])->name('removewishlist');
  Route::get('/checkout', [checkoutcontroller::class, 'checkout'])->name('checkout');
  Route::post('/billingdetails', [CheckoutController::class, 'billingdetails'])->name('billingdetails');
});
Route::get('/furni/register', [usercontroller::class, 'register'])->name('register');

Route::get('/services', [usercontroller::class, 'services'])->name('services');
Route::get('/about', [usercontroller::class, 'about'])->name('about');
Route::get('/contact', [usercontroller::class, 'contact'])->name('contact');
Route::post('/message', [usercontroller::class, 'message'])->name('message');
Route::get('/blog', [usercontroller::class, 'blog'])->name('blog');
Route::get('/mail', [usercontroller::class, 'mail'])->name('mail');
Route::get('/shop', [usercontroller::class, 'shop'])->name('shop');
Route::get('/logout', [usercontroller::class, 'logout']);
Route::get('/product/{id}', [ProductController::class, 'product'])->name('product');
Route::get('/explore{id}', [ProductController::class, 'explore'])->name('explore');
Route::get('/display', [Productcontroller::class, 'display'])->name('display');
Route::get('/search', [Productcontroller::class, 'search'])->name('search');



