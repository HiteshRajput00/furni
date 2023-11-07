<?php

namespace App\Http\Controllers\furnicontroller;


use App\Http\Controllers\Controller;
use App\Mail\messagemail;
use App\Models\Blog;
use App\Models\Furniture;
use App\Models\Products;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class usercontroller extends Controller
{
    //login function
    public function login()
    {
        return view('furni.user.login');
    }
    public function signin(Request $request)
    {
        $credent = $request->only('email', 'password');
        if (Auth::attempt($credent)) {
            $user = Auth::User();
            // return redirect('/');
        }
        return back()->with('msg', 'please enter vaild details');
    }
    //register function
    public function register()
    {
        return view('furni.user.register');
    }
    public function reg(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users|max:255',
            'number' => 'required|unique:users|',
            [
                'email.unique' => 'email already exists',
                'email.email' => 'Please enter a valid email.',
                'number.unique' => 'this number is already registered'
            ]
        ]);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->number = $request->number;
        $data->save();
      
        // return redirect('/');
       
    }
    //index 
    public function index()
    {
        $blogs = Blog::latest()->take(5)->get();
        $cats = Furniture::all();
        return view('furni.site-dashboard.index', compact('cats','blogs'));
    }
    //logout function
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    //shop function
    public function shop()
    {
        $categories = furniture::all();
        $products = Products::paginate(2);
        return view('furni.shop.index', compact('categories','products'));
    }

    //faaltu ke function
    public function services()
    {
        return view('furni.site-pages.services');
    }
    public function contact()
    {
        
        return view('furni.site-pages.contact');
    }
    public function blog()
    {
        $blogs = Blog::all();
        return view('furni.site-pages.blog', compact('blogs'));
    }
    public function about()
    {
        return view('furni.site-pages.about');
    }
    //user profile function
    public function userprofile()
    {
        return view('furni.user.profile');
    }

    public function message(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        
        Mail::to('vanshrana3204@gmail.com')->send(new messagemail($data));

        return back()->with('message', 'Your message has been sent to the admin.');
        
    }
    public function mail()
    {
        return view('furni.mail.index');
    }
}
