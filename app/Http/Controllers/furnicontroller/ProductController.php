<?php

namespace App\Http\Controllers\furnicontroller;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Products;
use App\Models\Variation;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
  
    
    public function explore($id)
    {
        // $products = Products::where('categoryID',$id)->get();
        $products = DB::table('products')
            ->where('categoryID', $id)  ->paginate(10);
            
          
        return view('furni.explorcontent.display', compact('products'));
    }
    //product details function
    public function product($id)
    {
        $products = products::find($id);
        $var = Variation::where('productID',$id)->get();
      
        return view('furni.explorcontent.product', compact('products',  'var'))->render();
    }
    //search function
    public function search(Request $request)
    {
        $products = DB::table('products')
            ->where('product',   $request->search)
            ->join('variations', 'productID', '=', 'products.id')
            ->select('product', 'products.id', 'variations.image', 'variations.price')
            ->get();
        $result = DB::table('furniture')
            ->where('furnituretype',   $request->search)
            ->join('products', 'categoryID', '=', 'furniture.id')
            ->select('products.id', 'product')
            ->join('variations', 'productID', '=', 'products.id')
            ->select('product', 'products.id', 'variations.image', 'variations.price','variations.stock')
            ->get();
        return view('furni.search.search', compact('result', 'products'));
    }
   
   
   
   

    
   
}
