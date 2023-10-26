<?php

namespace App\Http\Controllers\furnicontroller;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Variation;
use App\Models\Wishlist;
use Illuminate\Http\Request;


class WishlistController extends Controller
{
     // add to wishlist 
     public function addwishlist(Request $request)
     {
         // dd($request->all());
         $status = $request->input('status');
         $productId = $request->input('productid');
         $wishlist = wishlist::where('productID', $productId)->get();
         if ($wishlist->isEmpty()) {
             $wishlist = wishlist::where('productID', $productId)->get();
             $var = Variation::where('productID', $productId)->get();
             foreach ($var as $v) {
                 $data = new Wishlist();
                 $data->userID = auth::user()->id;
                 $data->productID = $v->productID;
                 $data->variationID = $v->id;
                 $data->save();
                 $img = url('/asset/images/filllove.png');
                 $id = "remove";
                 return response()->json(['img' => $img, 'btn' => $id]);
             }
         } else {
             $data =  Wishlist::where('productID', $productId);
             $data->delete();
             $img = url('/asset/images/love.png');
             $id = "add";
             return response()->json(['img' => $img, 'btn' => $id]);
         }
         return redirect('/product');
     }
     //remove from wishlist
     public function removewishlist(Request $request)
     {
         $productId = $request->input('productid');
         $data =  Wishlist::where('productID', $productId)->get();
         if ($data->isEmpty()) {
             $var = Variation::where('productID', $productId)->get();
             foreach ($var as $v) {
                 $add = new Wishlist();
                 $add->userID = auth::user()->id;
                 $add->productID = $v->productID;
                 $add->variationID = $v->id;
                 $add->save();
                 $img = url('/asset/images/filllove.png');
                 return response()->json(['img' => $img]);
             }
         } else {
             $item =  Wishlist::where('productID', $productId);
             $item->delete();
             $img = url('/asset/images/love.png');
             $id = "add";
             return response()->json(['img' => $img, 'btn' => $id]);
         }
     }
}
