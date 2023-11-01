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
use App\Models\Variation;

class checkoutcontroller extends Controller
{
    //checkout function
    public function checkout()
    {

        // $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET') );
        // #################### Create setupintent ##########################
        // $intent =  $stripe->setupIntents->create([
        //     'payment_method_types' => ['card'],
        // ]);
        // dd($intent);
        // $user = auth::user()->id;
        $carts = Cart::where('userID', Auth::user()->id)->get();
        $address = BillingDetails::where('userID',Auth::user()->id)->get();
        if ($carts->isEmpty()) {
            $total = "0";
        } else {
            foreach ($carts as $cart) {
                $price[] = $cart->variations->price * $cart->quantity;
            }
            $total = array_sum($price);
        }
        $coupon = Coupon::all();
        foreach($coupon as $c){
            if($c->expiredate<now()){
                $c->update(['status'=>0]);
            }
        }
        $coupons = Coupon::where('status','1')->get();
        $discount = Coupon::all()->pluck('value','id');
        return view('furni.checkout.index', compact('coupons', 'carts', 'total','discount','address'));
    }

    // place order function
    public function billingdetails(Request $request)
    {
        //  dd(  $request->input('Useraddress'));
      $addr =  $request->input('Useraddress');
        if($addr === null){
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
    
        $coupon = Coupon::find($request->code);
        $products = implode(",",$request->cartsproduct );
        $productvariation = implode(",",$request->productvariation );
        $order = new Order();
        $orderNumber = 'ORD' . str::random(8);
        $order->orderNUM = $orderNumber;
      
        $order->userID = Auth::user()->id;
        $order->productID = $products;
        $order->productvariation = $productvariation;
        $order->coupon = $coupon->code;
        $order->billing_detailsID = $rec->id;
        $dis = $request->subtotal - $request->total;
        $order->discount = $dis ;
        $order->totalamount = $request->total;
        $order->orderdate = now()->format('Y-m-d H:i:s');
        $order->save();
        }else{
           
            $products = implode(",",$request->cartsproduct );
            $productvariation = implode(",",$request->productvariation );
            $order = new Order();
            $orderNumber = 'ORD' . str::random(8);
            $order->orderNUM = $orderNumber;
          
            $order->userID = Auth::user()->id;
            $order->productID = $products;
           
            $order->productvariation = $productvariation;
           if(!$request->code){

           }else{
            $coupon = Coupon::find($request->code);
            $order->coupon = $coupon->code;
        }
            $order->billing_detailsID = $addr;
            $dis = $request->subtotal - $request->total;
            $order->discount = $dis ;
            $order->totalamount = $request->total;
            $order->orderdate = now()->format('Y-m-d H:i:s');
            $order->save();
        }
        $cart = Cart::where('userID',Auth::user()->id)->get();
        foreach($cart as $c){
            $product = Variation::find($c->variationID);
            // dd($product);
            $stock = $product->stock - $c->quantity;
            if($stock == 0){
                $product->update(['status'=>0]);
            }else{
            $product->update(['stock'=>$stock]);
        }
            $c->delete();
        }


        return view('furni.checkout.thankyou');
        
    }
}
