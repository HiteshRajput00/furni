<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\usercontroller;
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
Route::group(['middleware' => 'Admin', 'admin'], function () {
  Route::get('/profile', [AdminController::class, 'profile']);
  Route::get('/users', [AdminController::class, 'user']);
  Route::get('/adminlogout', [AdminController::class, 'adminlogout']);
  Route::get('/home', [ProductController::class, 'home'])->name('home');
  Route::get('/add', [ProductController::class, 'add']);
  Route::post('/savecoupon', [ProductController::class, 'savecoupon']);
  Route::get('/addcoupon', [ProductController::class, 'addcoupon'])->name('addcoupon');
  Route::get('/couponlist', [ProductController::class, 'couponlist']);
  Route::post('/save', [ProductController::class, 'save']);
  Route::post('/variable', [ProductController::class, 'variable']);
  Route::get('/list', [ProductController::class, 'list']);
  Route::get('/delete{id}', [ProductController::class, 'del'])->name('delete');
  Route::get('/edit{id}', [ProductController::class, 'edit'])->name('edit');
  Route::post('/update{id}', [ProductController::class, 'update'])->name('update');
  Route::get('/colour', [ProductController::class, 'colour']);
  Route::get('/material', [ProductController::class, 'material']);
  Route::get('/size', [ProductController::class, 'size']);
  Route::get('/category', [ProductController::class, 'category']);
  Route::post('/addcolour', [ProductController::class, 'addcolour']);
  Route::post('/addmaterial', [ProductController::class, 'addmaterial']);
  Route::post('/addsize', [ProductController::class, 'addsize']);
  Route::post('/addfurniture', [ProductController::class, 'addfurniture']);
  Route::post('/colour', [ProductController::class, 'colour']);
  Route::get('/variation{vID}', [ProductController::class, 'editvariation'])->name('variation');
  Route::post('/savevar{id}', [ProductController::class, 'savevar'])->name('savevar');
});
//user protected route
Route::group(['middleware' => 'Auth'], function () {
  Route::get('/userprofile', [usercontroller::class, 'userprofile'])->name('userprofile'); 
  Route::get('/addcart/{id}', [ProductController::class, 'addcart'])->name('shop.addcart');
  Route::get('/showcart', [ProductController::class, 'showcart'])->name('showcart');
  Route::get('/delcart{Cid}', [ProductController::class, 'delcart'])->name('delcart');
  Route::post('/applycoupon', [ProductController::class, 'applycoupon'])->name('applycoupon');
  Route::post('/removecoupon', [ProductController::class, 'removecoupon'])->name('removecoupon');
  Route::post('/addwishlist', [ProductController::class, 'addwishlist'])->name('addwishlist');
  Route::post('/removewishlist', [ProductController::class, 'removewishlist'])->name('removewishlist');
  Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
  Route::post('/billingdetails', [ProductController::class, 'billingdetails'])->name('billingdetails');
});
Route::get('/furni/register', [usercontroller::class, 'register'])->name('register');
Route::get('/services', [usercontroller::class, 'services'])->name('services');
Route::get('/about', [usercontroller::class, 'about'])->name('about');
Route::get('/contact', [usercontroller::class, 'contact'])->name('contact');
Route::get('/blog', [usercontroller::class, 'blog'])->name('blog');
Route::get('/shop', [usercontroller::class, 'shop'])->name('shop');
Route::get('/logout', [usercontroller::class, 'logout']);
Route::get('/product/{id}', [ProductController::class, 'product'])->name('product');
Route::get('/explore{id}', [ProductController::class, 'explore'])->name('explore');
Route::get('/display', [Productcontroller::class, 'display'])->name('display');
Route::get('/search', [Productcontroller::class, 'search'])->name('search');



