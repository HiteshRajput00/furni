<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Colour;
use App\Models\Coupon;
use App\Models\discount;
use App\Models\Furniture;
use App\Models\Size;
use App\Models\Type;
use App\Models\Material;
use App\Models\Products;
use App\Models\Status;
use App\Models\Variation;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //home function
    public function home()
    {
        $data = Products::count();
        $userCount = DB::table('users')->where('role', 'user')->count();
        //dd($data);
        return view('admin.index', compact('data', 'userCount'));
    }
    //add product
    public function add()
    {
        $statuss = Status::all();
        $types = Type::all();
        $colours = Colour::all();
        $materials = Material::all();
        $sizes = Size::all();
        $furnitures = Furniture::all();
        return view('admin.product.add', compact('colours', 'types', 'sizes', 'furnitures', 'materials', 'statuss'));
    }
    //add function save
    public function save(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'product' => 'required',
            'category' => 'required',
            'type' => 'required',
            'price' => 'required',
            'image' => 'required',
            'colour' => 'required',
            'material' => 'required',
            'size' => 'required',
        ]);
        $data = new Products();
        $data->product = $request->product;
        $data->categoryID = $request->category;
        $data->typeID = $request->type;
        $data->save();
        $product_id = $data->id;
        if ($request->type == 2) {
            if ($images = $request->file('image')) {
                foreach ($images as $image) {
                    $file = $image;
                    $name = time() . rand(1, 100) . '.' . $file->extension();
                    $file->move('upload', $name);
                    $img[] = $name;
                }
            }
            for ($i = 0; $i < count($request->price); $i++) {
                $var = new Variation();
                $var->productID = $product_id;
                $var->image = $img[$i];
                $var->price = $request->price[$i];
                $var->colourID = $request->colour[$i];
                $var->materialID = $request->material[$i];
                $var->sizeID = $request->size[$i];
                $var->stock = $request->stock[$i];
                $var->save();
            }
        } elseif ($request->type == 1) {
            if ($image = $request->File('image')) {
                foreach ($image as $img) {
                    $file = $img;
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension;
                    echo $filename;
                    $file->move('upload', $filename);
                    $images[] = $filename;
                }
            }
            for ($v = 0; $v < count($request->price); $v++) {
                $variation = new Variation();
                $variation->productID = $product_id;
                $variation->image = $images[$v];
                $variation->price = $request->price[$v];
                $variation->colourID = $request->colour[$v];
                $variation->materialID = $request->material[$v];
                $variation->sizeID = $request->size[$v];
                $variation->stock = $request->stock[$v];
                $variation->save();
            }
        }
        return redirect('/list')->with('success', 'product has been added');
    }
    //list function
    public function list()
    {
        $products = variation::with('products')->paginate(50);
        return view('admin.product.list', compact('products'));
    }
    //delete function
    public function del($id)
    {
        $carts = Cart::where('productID', $id);
        $wishlist = Wishlist::where('productID', $id);
        $vars = variation::where('productID', $id);
        $var = products::find($id);
        $carts->delete();
        $wishlist->delete();
        $vars->delete();
        $var->delete();
        return redirect('/list');
    }
    //edit product function
    public function edit($id)
    {
        $data = Products::find($id);
        $category = Furniture::find($data->categoryID);
        $type = Type::find($data->typeID);
        $types = Type::all();
        $posts = Colour::all();
        $materialss = Material::all();
        $sizes = Size::all();
        $furnitures = Furniture::all();
        $var = Variation::where('productID', $id)->get();
        foreach ($var as $i => $v) {
            $pid = Variation::where('productID', $v->productID)->get();
            $colour = Colour::find($v->colourID);
            $material = Material::find($v->materialID);
            $size = Size::find($v->sizeID);
        }
        return view('admin.product.edit', compact('data', 'pid', 'type', 'types', 'posts', 'materialss', 'sizes', 'furnitures', 'colour', 'material', 'size', 'category'));
    }
    //update product function
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $record = Products::find($id);
        $record->update([
            'product' => $request->product,
            'categoryID' => $request->category,
            'typeID' => $request->type,
        ]);
        if ($image = $request->File('image')) {
            $image = $request->file('image');
            $images = [];
            for ($v = 0; $v < count($request->price); $v++) {
                $img = $image[$v];
                $file = $img;
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                //echo $filename;
                $file->move('upload', $filename);
                $images[] = $filename;
                $prices[] = $request->price[$v];
                $colours[] = $request->colour[$v];
                $materials[] = $request->material[$v];
                $sizes[] = $request->size[$v];
            }
        }
        $vars = variation::where('productID', $id)->get();
        foreach ($vars as $var) {

            $v = variation::find($var->id);
            $v->update([
                'image' => $images,
                'price' => $prices,
                'colourID' => $colours,
                'materialID' => $materials,
                'sizeID' => $sizes

            ]);
            echo "done";
        }
        // return redirect('/list');
    }
    //edit variation function
    public function editvariation($vID)
    {
        $data = Variation::find($vID);
        $posts = Colour::all();
        $materialss = Material::all();
        $sizes = Size::all();
        return view('admin.product.editvariation', compact('data', 'posts', 'materialss', 'sizes'));
    }
    public function savevar(Request $request, $id)
    {
        $var = Variation::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload', $filename);
            $image = $filename;
            $var->update([
                'image' => $image,
                'price' => $request->price,
                'colourID' => $request->colour,
                'materialID' => $request->material,
                'sizeID' => $request->size,
            ]);
        }
        return redirect()->route('edit', ['id' => $var->productID]);
    }
    //add coupon 
    public function addcoupon()
    {
        return view('admin.coupon.index');
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
        return "done";
    }
    public function couponlist()
    {
        $coupons = Coupon::all();
        return view('admin.coupon.list', compact('coupons'));
    }
    //colour function
    public function colour()
    {
        return view('admin.product.category.addcolour');
    }
    public function addcolour(Request $request)
    {
        $request->validate([
            'colour' => 'required|unique:colours|max:255',
        ]);
        $colour = new Colour();
        $colour->colour = $request->colour;
        $colour->colourcode = $request->colourcode;
        $colour->save();
        return redirect('/colour');
    }
    //material function
    public function material()
    {
        return view('admin.product.category.addmaterial');
    }
    public function addmaterial(Request $request)
    {
        $request->validate([
            'type' => 'required|unique:materials|max:255',
        ]);
        $material = new Material();
        $material->type = $request->type;
        $material->save();
        return redirect('/material');
    }
    //size function
    public function size()
    {
        return view('admin.product.category.addsize');
    }
    public function addsize(Request $request)
    {
        $request->validate([
            'size' => 'required|unique:sizes|max:255',
        ]);
        $size = new Size();
        $size->size = $request->size;
        $size->save();
        return redirect('/size');
    }
    //category function
    public function category()
    {
        return view('admin.product.category.furniture');
    }
    public function addfurniture(Request $request)
    {
        $request->validate([
            'furnituretype' => 'required|unique:furniture|max:255',
        ]);
        $furni = new Furniture();
        $furni->furnituretype = $request->furnituretype;
        $furni->save();
        return redirect('/furniture');
    }
    public function explore($id)
    {
        $products = DB::table('products')
            ->where('categoryID', $id)
            ->join('variations', 'productID', '=', 'products.id')
            ->select('products.id', 'product', 'variations.image', 'variations.price')
            ->get();
        return view('furni.shop.display', compact('products'));
    }
    //product details function
    public function product($id)
    {
        $products = products::find($id);
        $wishlist = Wishlist::where('productID', $id)
            ->where('userID', Auth::user()->id)->get();
        $var = variation::where('productID', $id)->get();
        return view('furni.shop.product', compact('products', 'wishlist', 'var'))->render();
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
            ->select('product', 'products.id', 'variations.image', 'variations.price')
            ->get();
        return view('furni.shop.search', compact('result', 'products'));
    }
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
        return view('furni.shop.showcart', compact('carts', 'total', 'coupon'));
    }
    //delete from cart 
    public function delcart($Cid)
    {
        $data = Cart::where('id', $Cid)
            ->where('userID', Auth::user()->id);
        $data->delete();
        return back();
    }
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
    // apply coupon
    public function applycoupon(Request $request)
    {
        $c = $request->code;
        $data = Coupon::find($c);
        if (session('id') !== $data->id) {
            session()->put([
                'name' => $data->name,
                'id' => $data->id,
                'userID' => Auth::user()->id,
            ]);
            $carts = Cart::with('products', 'variations')->where('userID', Auth::user()->id)->get();
            foreach ($carts as $cart) {
                $prices[] = $cart->variations->price * $cart->quantity;
            }
            $total = array_sum($prices);
            session()->put(['total', $total]);
            if ($data->type === "fixed") {
                $discount = $total - $data['value'];
                session()->put('discount', $discount);
            } else {
                $dis = $total * $data['value'] / 100;
                $discount = $total - $dis;
                session()->put('discount', $discount);
            }
            $newElement =  "<strong><del>$" . $total . "</del></strong>";
            $new =  "<strong>$" . session('discount') . "</strong>";
            // $n =  "<strong>$" . session('discount') . "</strong>";
            $data =  "<strong> after discount</strong>";
            $btn = "x";
            return response()->json([
                'btn' => $btn,
                'element' => $newElement,
                'new' => $new,
                'n' => $new,
                'd' => $data
            ]);
        } else {
            session()->forget(['name', 'id', 'userID']);
            $carts = Cart::with('products', 'variations')->where('userID', Auth::user()->id)->get();
            foreach ($carts as $cart) {
                $prices[] = $cart->variations->price * $cart->quantity;
            }
            $total = array_sum($prices);
            $data =  "<strong></strong>";

            $newElement =  "<strong>$" . $total . "</strong>";
            $new =  "<strong>" . $total . "</strong>";
            $btn = "apply";
            return response()->json([
                'btn' => $btn,
                'element' => $newElement,
                'n' => $new,
                'new' => $data,
                'd' => $data
            ]);
        }
    }
    // remove coupon
    public function removecoupon(Request $request)
    {
        $c = $request->ID;
        $data = Coupon::find($c);
        if (session('id') !== $data->id) {
            session()->put([
                'name' => $data->name,
                'id' => $data->id,
                'userID' => Auth::user()->id,
            ]);
            $carts = Cart::with('products', 'variations')->where('userID', Auth::user()->id)->get();
            foreach ($carts as $cart) {
                $prices[] = $cart->variations->price * $cart->quantity;
            }
            $total = array_sum($prices);
            session()->put(['total', $total]);
            if ($data->type === "fixed") {
                $discount = $total - $data['value'];
                session()->put('discount', $discount);
            } else {
                $dis = $total * $data['value'] / 100;
                $discount = $total - $dis;
                session()->put('discount', $discount);
            }
            $newElement =  "<strong><del>$" . $total . "</del></strong>";
            $new =  "<strong>$" . session('discount') . "</strong>";
            // $n =  "<strong>$" . session('discount') . "</strong>";
            $data =  "<strong>after discount</strong>";
            $btn = "x";
            return response()->json([
                'btn' => $btn,
                'element' => $newElement,
                'new' => $new,
                'n' => $new,
                'd' => $data
                
            ]);
        } else {
            session()->forget(['name', 'id', 'userID']);
            $carts = Cart::with('products', 'variations')->where('userID', Auth::user()->id)->get();
            foreach ($carts as $cart) {
                $prices[] = $cart->variations->price * $cart->quantity;
            }
            $total = array_sum($prices);
            $data =  "<strong></strong>";

            $newElement =  "<strong>$" . $total . "</strong>";
            $new =  "<strong>" . $total . "</strong>";
            $btn = "apply";
            return response()->json([
                'btn' => $btn,
                'element' => $newElement,
                'n' => $new,
                'new' => $data,
                'd' => $data
            ]);
        }
    }

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
        return view('furni.shop.checkout', compact('coupon', 'carts', 'total'));
    }

    // place order function
    public function billingdetails(Request $request){
        dd($request->all());
    }
}
