<?php

namespace App\Http\Controllers\furnicontroller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\BillingDetails;
use App\Models\Coupon;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
class checkoutcontroller extends Controller
{
    //checkout function
    public function checkout()
    {
        // $user = auth::user()->id;
        $carts = Cart::where('userID', Auth::user()->id)->get();
        if ($carts->isEmpty()) {
            $total = "0";
        } else {
            foreach ($carts as $cart) {
                $price[] = $cart->variations->price * $cart->quantity;
            }
            $total = array_sum($price);
        }
        $coupon = Coupon::all();
        $discount = Coupon::all()->pluck('value','id');
        return view('furni.checkout.index', compact('coupon', 'carts', 'total','discount'));
    }

    // place order function
    public function billingdetails(Request $request)
    {
        // dd($request->all());
      $name =  $request->input('fname');
        if($name !== null){
        $rec = new BillingDetails();
        $rec->userID = Auth::user()->id;
        $rec->fname = $request->fname;
        $rec->lname = $request->lname;
        $rec->companyname = $request->c_companyname;
        $rec->email = $request->email;
        $rec->number = $request->phone;
        $rec->street = $request->address;
        $rec->houseNO = $request->house;
        $rec->statecountry = $request->statecountry;
        $rec->zip = $request->zip;
        $rec->save();
    }
        $coupon = Coupon::find($request->code);
        $products = serialize($request->cartsproduct);
        $order = new Order();
        $orderNumber = 'ORD' . str::random(8);
        $order->orderNUM = $orderNumber;
      
        $order->userID = Auth::user()->id;
        $order->productID = $products;
        $order->coupon = $coupon->code;
        $dis = $request->subtotal - $request->total;
        $order->discount = $dis ;
        $order->totalamount = $request->total;
        $order->orderdate = now()->format('Y-m-d H:i:s');
        // $order->save();

        return view('furni.checkout.thankyou');
        
    }
}
