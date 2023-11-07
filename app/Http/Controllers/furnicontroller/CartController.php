<?php

namespace App\Http\Controllers\furnicontroller;

use App\Events\SiteChanges;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Variation;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // cart function
    public function addcart( $cid)
    {
        $variation = Variation::find( $cid);
        
     
            $p = Cart::where('productID', $variation->productID)->where('userID',Auth::user()->id)->get();
            $c = $p->count();
            if ($p->isEmpty()) {
                $data = new Cart();
                $data->userID = Auth::user()->id;
                $data->productID = $variation->productID;
                $data->variationID = $variation->id;
                $data->save();
            } else {
                foreach ($p as $v) {
                    if($v->stock>=1){
                    if ($v->variationID !== $variation->id) {
                        $data = new Cart();
                        $data->userID = Auth::user()->id;
                        $data->productID = $variation->productID;
                        $data->variationID = $variation->id;
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

    public function myorders()
    {
        $orders = Order::where('userID', Auth::user()->id)->get();

        return view('furni.Cart.myorders', compact('orders'));
    }

      //delete from cart 
      public function deleteCart(Request $request){
       

        $ID = $request->input('id');
       $cart = Cart::find($ID);
       $carts = Cart::all();
  
        if($cart->quantity>=2){
            $cart->update(['quantity'=>$cart->quantity - 1,]);
              
        $Newqty= $cart->quantity;
        // $total_price = $total - $cart->total_price;
        return response()->json(['qty'=>$Newqty]);
       }else{
        $cart->delete();
        return response()->json(['msg1'=>"done"]);
      }
      }

    public function changeCart(Request $request){
        $ID = $request->input('id');
        $cart = Cart::find($ID);
        $cart->update(['quantity'=>$cart->quantity+1]);
        $newqty = $cart->quantity ;
        return response()->json(['data'=>$newqty]);
    }
}
