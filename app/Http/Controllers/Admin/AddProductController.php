<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Colour;
use App\Models\Furniture;
use App\Models\Material;
use App\Models\Products;
use App\Models\Variation;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    public function add()
    {
        $colours = Colour::all();
        $materials = Material::all();
        $furnitures = Furniture::all();
        return view('admin.product.add', compact('colours', 'furnitures', 'materials'));
    }
  /////////////// add processs  ////////////////////////////
    public function save(Request $request)
    {
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

      ///////////////// if product type variable //////////////////////////////
        if ($request->type == 2) {
//////////////// storing array of images//////////////////////////////////////
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
                $var->size = $request->size[$i];
                $var->stock = $request->stock[$i];
                $var->save();
            }
        //////////////////////product type simple ///////////////////////////
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
                $variation->size = $request->size[$v];
                $variation->stock = $request->stock[$v];
                $variation->save();
            }
        }
        return redirect('/list')->with('success', 'product has been added');
    }
    
     public function list()
     {
         $products = variation::with('products')->paginate(50);
         return view('admin.product.list', compact('products'));
     }
}
