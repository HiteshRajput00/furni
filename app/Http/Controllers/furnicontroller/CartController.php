<?php

namespace App\Http\Controllers\furnicontroller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Variation;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
     // cart function
     public function addcart($cid)
     {
         $variation = Variation::where('productID', $cid)->get();
         foreach ($variation as $var) {
             $p = Cart::where('productID', $var->productID)->where('variationID', $var->id)->get();
             $c = $p->count();
             if ($p->isEmpty()) {
                 $data = new Cart();
                 $data->userID = Auth::user()->id;
                 $data->productID = $var->productID;
                 $data->variationID = $var->id;
                 $data->save();
             } else {
                 foreach ($p as $v) {
                     if (Auth::user()->id !== $v->userID) {
                         $data = new Cart();
                         $data->userID = Auth::user()->id;
                         $data->productID = $var->productID;
                         $data->variationID = $var->id;
                         $data->save();
                     } else {
                         $u = cart::find($v->id);
                         $u->update([
                             'quantity' => $u->quantity + 1,
                         ]);
                     }
                 }
             }
         }
         return redirect('/showcart');
     }
     //showcart function
     public function showcart()
     {
         $user = auth::user()->id;
         $carts = Cart::where('userID', Auth::user()->id)->get();
         if ($carts->isEmpty()) {
             $total = "0";
         } else {
             foreach ($carts as $cart) {
                 $price[] = $cart->variations->price * $cart->quantity;
             }
             $total = array_sum($price);
         }
         $coupon = coupon::all();
         return view('furni.Cart.index', compact('carts', 'total', 'coupon'));
     }
     //delete from cart 
     public function delcart($Cid)
     {
         $data = Cart::where('id', $Cid)
             ->where('userID', Auth::user()->id);
         $data->delete();
         return back();
     }
}
