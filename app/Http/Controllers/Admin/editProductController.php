<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Colour;
use App\Models\Furniture;
use App\Models\Type;
use App\Models\Material;
use App\Models\Products;
use App\Models\Variation;
use App\Models\Wishlist;
use Illuminate\Http\Request;


class editProductController extends Controller
{
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
        
          $furnitures = Furniture::all();
          $var = Variation::where('productID', $id)->get();
          foreach ($var as $i => $v) {
              $pid = Variation::where('productID', $v->productID)->get();
              $colour = Colour::find($v->colourID);
              $material = Material::find($v->materialID);
            
          }
          return view('admin.product.edit', compact('data', 'pid', 'type', 'types', 'posts', 'materialss', 'furnitures', 'colour', 'material',  'category'));
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
       
          return view('admin.product.editvariation', compact('data', 'posts', 'materialss'));
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
}
