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
use App\Models\Payment;
use App\Models\Variation;

use Stripe\Webhook;

class checkoutcontroller extends Controller
{
    ///////////////////checkout function  ///////////////////////////////
    public function checkout()
    {

        $carts = Cart::where('userID', Auth::user()->id)->get();
        $address = BillingDetails::where('userID', Auth::user()->id)->get();
        if ($carts->isEmpty()) {
            $total = "0";
        } else {
            foreach ($carts as $cart) {
                $price[] = $cart->variations->price * $cart->quantity;
            }
            $total = array_sum($price);
        }
        $coupon = Coupon::all();
        foreach ($coupon as $c) {
            if ($c->expiredate < now()) {
                $c->update(['status' => 0]);
            }
        }
        $coupons = Coupon::where('status', '1')->get();
        $discount = Coupon::all()->pluck('value', 'id');
        return view('furni.checkout.index', compact('coupons', 'carts', 'total', 'discount', 'address'));
    }



    //////////// place  order  with payment //////////////
    public function testpayment(Request $request)
    {
        if ($request->input('Useraddress') !== null) {
            $request->validate([
                'Useraddress' => 'required',
            ]);
        } elseif ($request->input('fname') !== null) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|',
                'phone' => 'required',
                'address' => 'required',
                'house' => 'required',
                'statecountry' => 'required',
                'zip' => 'required',
            ]);
        } else {
            $request->validate([
                'Useraddress' => 'required',
            ]);
        }

        /////////// saving address ///////////////////
        $addr = $request->input('Useraddress');

        if ($addr === null) {
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
        } else {
            $addr_ID = $addr;
        }

        //////////////// order details /////////////////////////
        $products = implode(",", $request->cartsproduct);
        $productvariation = implode(",", $request->productvariation);
        $variation_qty = implode(",", $request->variation_qty);
        $order = new Order();
        $orderNumber = 'ORD' . str::random(8);
        $order->orderNUM = $orderNumber;

        $order->userID = Auth::user()->id;
        $order->productID = $products;
        $order->productvariation = $productvariation;
        $order->variation_qty = $variation_qty;

        //////////// checking coupon /////////////////////
        if ($request->code === null) {
            $order->coupon = 0;
        } else {
            $coupon = Coupon::find($request->code);
            $order->coupon = $coupon->code;
        }

        ////////////// checking address new or pervious /////////////////
        if ($addr === null) {
            $order->billing_detailsID = $rec->id;
        } else {
            $order->billing_detailsID = $addr;
        }

        ////////////////////// finding Discount ///////////////////////
        $dis = $request->subtotal - $request->total;
        $order->discount = $dis;
        $order->totalamount = $request->total;
        $order->orderdate = now()->format('Y-m-d H:i:s');

        $price = $request->total;

        ///////////////// making payment by stripe  /////////////////////
        try {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $stripeCustomer = $stripe->customers->create([
                'name' => $request->fname,
                'email' => $request->email,
                'address' => [
                    'postal_code' => $request->zip,
                    'state' => $request->statecountry,
                    'country' => $request->country,
                ],
                'payment_method' => $request->token,
            ]);

            $paymentMethodId = $request->token;

            $paymentIntentObject = $stripe->paymentIntents->create([
                'amount' => (int) $price * 100,
                'currency' => 'inr',
                'customer' => $stripeCustomer->id,
                'payment_method_types' => ['card'],
                'payment_method' => $paymentMethodId,
                'metadata' => ['order_id' => $orderNumber],
                'capture_method' => 'manual',
                // 'confirm' => true,
                // 'off_session' => true,
                'description' => 'product purchased',
            ]);

            ///////////////// checking payment status //////////////////
            $clientsecret = $paymentIntentObject->client_secret;
            $ordernum = $orderNumber;

            if ($paymentIntentObject->status === 'requires_confirmation') {
                $order->status = 0;
                $payment = new Payment();
                $payment->orderNUM = $orderNumber;
                $payment->total_amount = $price;
                $payment->status = 0;
                $payment->save();
                $order->save();
                return view('furni.checkout.Handle_request', compact('clientsecret', 'ordernum'));

            } elseif ($paymentIntentObject->status === 'succeeded') {
                $order->status = 1;
                $order->save();

                ////////////// Payment data ///////////////////////

                return view('furni.checkout.thankyou');
            } else {
                $order->status = 0;
                $order->save();
                return view('furni.checkout.Payment_Failed');
            }

        } catch (\Stripe\Exception\CardException $e) {
            $error = $e->getError();
            $errorMessage = $error->message;
            return view('furni.checkout.Payment_Failed', ['errorMessage' => $errorMessage]);
        }
    }
    //////////////////////////////////////////////////////////////////////////////////////////


    //////////////////////////////// 3D secure User Authentication //////////////////////////////
    public function paymentsuccess($id)
    {

        $order = Order::where('orderNUM', $id)->get();
        foreach ($order as $o) {
            $payment = Payment::where('orderNUM', '=', $o->orderNUM)->get();
            foreach ($payment as $pay) {
                $pay->update(['status' => 1]);
            }
            $o->update(['status' => 1]);
        }
        //////////// removing product from  cart ////////////////////////
        $cart = Cart::where('userID', Auth::user()->id)->get();
        foreach ($cart as $c) {
            $product = Variation::find($c->variationID);
            $stock = $product->stock - $c->quantity;
            if ($stock == 0) {
                $product->update(['status' => 0]);
            } else {
                $product->update(['stock' => $stock]);
            }
            $c->delete();
        }
        return view('furni.checkout.thankyou');
    }
}
