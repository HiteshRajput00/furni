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
            
        ]);
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->sub_title = $request->subtitle;
      
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

    public function bloglist(){
        $blogs = Blog::all();
        return view('admin.blogs.bloglist', compact('blogs'));
    }

    public function blogdelete($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('bloglist');
    }

    public function editblog($id){
        $blog = Blog::find($id);
        return view('admin.blogs.editblog', compact('blog'));

    }

    public function updateblog(Request $request, $id){
        $blog = Blog::find($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $request->title.rand(0,100).'.'.$file->extension();
            $file->move(public_path().'/blog_images/', $filename);
            $image = $filename;
        }
        $blog->update([
            'title '=>$request->title,
            'slug' =>$request->slug,
            'sub_title'=>$request->subtitle,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'name' => $request->Wname,
            'image' => $image,

        ]);
        return redirect('bloglist');

    }
}
