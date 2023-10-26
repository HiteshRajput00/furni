<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //add coupon 
    public function addcoupon()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.index', compact('coupons'));
    }
    public function savecoupon(Request $req)
    {
        // dd($req->all());
        $data = new Coupon();
        $data->name = $req->couponname;
        $data->code = $req->couponcode;
        $data->type = $req->type;
        if ($req->type === "fixed") {
            $data->value = $req->value;
        } else {
            $value = $req->value;
            $data->value = $value;
        }
        $data->status = $req->status;
        $data->expiredate = $req->expiredate;
        $data->save();
        return redirect('/addcoupon');
    }
   
}
