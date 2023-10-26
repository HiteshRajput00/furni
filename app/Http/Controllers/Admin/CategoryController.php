<?php

namespace App\Http\Controllers\Admin;


use App\Models\Colour;
use App\Models\Furniture;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
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
    
    
     //category function
     public function category()
     {
         return view('admin.product.category.Categories');
     }
     public function addfurniture(Request $request)
     {
         $request->validate([
             'furnituretype' => 'required|unique:furniture|max:255',
             'image' => 'required',
         ]);
         if ( $request->file('image')) {
            $file = $request->image;
            $name = time() . rand(1, 100) . '.' . $file->extension();
            $file->move('upload', $name);
            $img = $name;
          
           }
           $furni = new Furniture();
           $furni->image = $img;
           $furni->furnituretype = $request->furnituretype;
           $furni->save();
 
         return redirect('/furniture');
     }
}
