<?php

namespace App\Http\Controllers\furnicontroller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Variation;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // cart function
    public function addcart($cid)
    {
        $variation = Variation::where('productID', $cid)->get();
        foreach ($variation as $var) {
            $p = Cart::where('productID', $var->productID)->where('userID',Auth::user()->id)->get();
            $c = $p->count();
            if ($p->isEmpty()) {
                $data = new Cart();
                $data->userID = Auth::user()->id;
                $data->productID = $var->productID;
                $data->variationID = $var->id;
                $data->save();
            } else {
                foreach ($p as $v) {
                    if ($v->variationID !== $var->id) {
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

    public function myorders()
    {
        $orders = Order::where('userID', Auth::user()->id)->get();

        // echo "<pre>";
        // print_r($orders);
        // die();
        // $results = DB::table('orders')
        //     ->select('orders.*')
        //     ->join('other_table', function ($join) use () {
        //         $join->on('other_table.id', '=', DB::raw("JSON_UNQUOTE(JSON_EXTRACT(your_table.json_column, '$.user_id'))"))
        //             ->where('other_table.user_id', $userId);
        //     })
        //     ->get();
        return view('furni.Cart.myorders', compact('orders'));
    }
}
