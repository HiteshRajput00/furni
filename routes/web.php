<?php


use App\Http\Controllers\Admin\AddProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Blogcontroller;
use App\Http\Controllers\furnicontroller\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\furnicontroller\checkoutcontroller;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\editProductController;
use App\Http\Controllers\Admin\SitemetaController;
use App\Http\Controllers\furnicontroller\ProductController;
use App\Http\Controllers\furnicontroller\usercontroller;
use App\Http\Controllers\furnicontroller\WishlistController;
use App\Mail\messagemail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
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
///////////////////////////// dashboard and pages routes ///////////////////////////
Route::get('/', [usercontroller::class, 'index'])->name('index');
Route::get('/services', [usercontroller::class, 'services'])->name('services');
Route::get('/about', [usercontroller::class, 'about'])->name('about');
Route::get('/contact', [usercontroller::class, 'contact'])->name('contact');
Route::post('/message', [usercontroller::class, 'message'])->name('message');
Route::get('/blog', [usercontroller::class, 'blog'])->name('blog');
Route::get('/mail', [usercontroller::class, 'mail'])->name('mail');
/////////////////////////////////////////////////////////////////////////////////


///////////////////////////// login register routes  ///////////////////////////
Route::get('/furni/login', [usercontroller::class, 'login'])->name('login');
Route::get('/furni/register', [usercontroller::class, 'register'])->name('register');
Route::post('/store', [AdminController::class, 'store']);
Route::post('/log', [AdminController::class, 'log']);
Route::get('/logout', [usercontroller::class, 'logout']);
Route::get('/userprofile', [usercontroller::class, 'userprofile']);
/////////////////////////////////////////////////////////////////////////////////


/////////////////////////////  admin routes  ///////////////////////////
Route::group(['middleware' =>  'Admin'], function () {

  ///////////////////////////// admin home  ///////////////////////////
  Route::get('/home', [AdminController::class, 'home'])->name('home');
  Route::get('/profile', [AdminController::class, 'profile']);
  Route::get('/adminlogout', [AdminController::class, 'adminlogout']);
  Route::get('/orders', [AdminController::class, 'orders']);
/////////////////////////////////////////////////////////////////////////////////

  ///////////////////////////// blog routes  ///////////////////////////
  Route::get('/addblog', [Blogcontroller::class, 'addblog'])->name('addblog');
  Route::post('/saveblog', [Blogcontroller::class, 'saveblog'])->name('saveblog');
  Route::get('/bloglist', [Blogcontroller::class, 'bloglist'])->name('bloglist');
  Route::get('/blogdelete/{id}', [Blogcontroller::class, 'blogdelete'])->name('blogdelete');
  Route::get('/editblog/{id}', [Blogcontroller::class, 'editblog'])->name('editblog');
  Route::post('/updateblog/{id}', [Blogcontroller::class, 'updateblog'])->name('updateblog');
////////////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////// Site Information //////////////////////////////////////
Route::get('/site-metas',[SitemetaController::class, 'SiteMeta']);
Route::post('/addsiteinfo',[SitemetaController::class, 'addprocess']);
/////////////////////////////////////////////////////////////////////////////////////

  ///////////////////////////// product routes  ///////////////////////////
  Route::get('/add', [AddProductController::class, 'add']);
  Route::post('/save', [AddProductController::class, 'save']);
  Route::get('/list', [AddProductController::class, 'list']);
  Route::get('/delete{id}', [editProductController::class, 'del'])->name('delete');
  Route::get('/edit{id}', [editProductController::class, 'edit'])->name('edit');
  Route::post('/update{id}', [editProductController::class, 'update'])->name('update');
  Route::get('/variation{vID}', [editProductController::class, 'editvariation'])->name('variation');
  Route::post('/savevar{id}', [editProductController::class, 'savevar'])->name('savevar');
////////////////////////////////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////coupons routes  ///////////////////////////
  Route::post('/savecoupon', [CouponController::class, 'savecoupon']);
  Route::get('/addcoupon', [CouponController::class, 'addcoupon'])->name('addcoupon');
   /////////////////////////////////////////////////////////////////////////////////


/////////////////////////// category routes  ////////////////////////
  Route::get('/colour', [CategoryController::class, 'colour']);
  Route::get('/material', [CategoryController::class, 'material']);
  Route::get('/category', [CategoryController::class, 'category']);
  Route::post('/addcolour', [CategoryController::class, 'addcolour']);
  Route::post('/addmaterial', [CategoryController::class, 'addmaterial']);
  Route::post('/addfurniture', [CategoryController::class, 'addfurniture']);
  ////////////////////////////////////////////////////////////////////////

});


//////////////////////user protected route///////////////////////////////////
Route::group(['middleware' => 'Auth'], function () {

 ////////////////////// // cart routes///////////////////////////////
  Route::get('/addcart/{id}', [CartController::class, 'addcart'])->name('shop.addcart');
  Route::get('/showcart', [CartController::class, 'showcart'])->name('showcart');
  Route::get('/delcart{Cid}', [CartController::class, 'delcart'])->name('delcart');
  Route::get('/myorders', [CartController::class, 'myorders'])->name('myorders');
  Route::post('/deletecart', [CartController::class, 'deletecart'])->name('deletecart');
  Route::post('/changecart', [CartController::class, 'changecart'])->name('changecart');
  /////////////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////////////// wishlist route ///////////////////////////////////////
  Route::post('/addwishlist', [WishlistController::class, 'addwishlist'])->name('addwishlist');
  Route::post('/removewishlist', [WishlistController::class, 'removewishlist'])->name('removewishlist');
  //////////////////////////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////// checkout routes //////////////////////////////////////////////////////
  Route::get('/checkout', [checkoutcontroller::class, 'checkout'])->name('checkout');
  Route::post('/paymentprocess',[checkoutcontroller::class,'testpayment']);
  Route::get('/payment-success{id}',[checkoutcontroller::class,'paymentsuccess'])->name('payment-success');
  Route::post('/handle-3d-secure',[checkoutcontroller::class,'requestHandle'])->name('handle-3d-secure');
////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////  apply remove  coupon  ///////////////////////////////////////
  Route::post('/applycoupon',[CouponController::class,'applycoupon'])->name('applycoupon');
  Route::post('/removecoupon',[CouponController::class,'removecoupon'])->name('removecoupon');
  /////////////////////////////////////////////////////////////////////////////////////////
});


////////////////////////// shop routes   ////////////////////////
Route::get('/shop', [usercontroller::class, 'shop'])->name('shop');
Route::get('/product/{id}', [ProductController::class, 'product'])->name('product');
Route::get('/explore{id}', [ProductController::class, 'explore'])->name('explore');
Route::get('/display', [Productcontroller::class, 'display'])->name('display');
Route::get('/search', [Productcontroller::class, 'search'])->name('search');
////////////////////////////////////////////////////////////////////////


////////////////////////////////// test mail ///////////////////////////////////
Route::get('/send-test-email', function () {
  Mail::to('hit8708542@gmail.com')->send(new messagemail('hi'));
  return 'Test email sent.';
});
//////////////////////////////////////////////////////////////////////







