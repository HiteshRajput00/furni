<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class Blogcontroller extends Controller
{
    public function addblog(){
        return view('admin.blogs.addblog');
    }

    public function saveblog(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required',
         
            'subtitle' => 'required',
            'image' => 'required',
            'category' => 'required'
        ]);
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->sub_title = $request->subtitle;
        $blog->cat_id = $request->category;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->name = $request->Wname;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $request->title.rand(0,100).'.'.$file->extension();
            $file->move(public_path().'/blog_images/', $filename);
            $blog->image = $filename;
        }
        $blog->save();
    }
}
