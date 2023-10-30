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
         $wishlist = wishlist::where('variationID', $productId)->get();
         if ($wishlist->isEmpty()) {
            //  $wishlist = wishlist::where('productID', $productId)->get();
             $var = Variation::find( $productId);
            
                 $data = new Wishlist();
                 $data->userID = auth::user()->id;
                 $data->productID = $var->productID;
                 $data->variationID = $var->id;
                 $data->save();
                 $img = url('/asset/images/filllove.png');
                 $id = "remove";
                 return response()->json(['img' => $img, 'btn' => $id]);
          
         } else {
             $data =  Wishlist::where('variationID', $productId);
             $data->delete();
             $img = url('/asset/images/love.png');
             $id = "add";
             return response()->json(['img' => $img, 'btn' => $id]);
         }
        
     }
     //remove from wishlist
     public function removewishlist(Request $request)
     {
         $productId = $request->input('productid');
         $data =  Wishlist::where('variationID', $productId)->get();
         if ($data->isEmpty()) {
             $var = Variation::find($productId);
            
                 $add = new Wishlist();
                 $add->userID = auth::user()->id;
                 $add->productID = $var->productID;
                 $add->variationID = $var->id;
                 $add->save();
                 $img = url('/asset/images/filllove.png');
                 return response()->json(['img' => $img]);
           
         } else {
             $item =  Wishlist::where('variationID', $productId);
             $item->delete();
             $img = url('/asset/images/love.png');
             $id = "add";
             return response()->json(['img' => $img, 'btn' => $id]);
         }
     }
}
