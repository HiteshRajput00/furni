<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\product;
use App\Models\Colour;
use App\Models\Coupon;
use App\Models\Variation;
use App\Models\size;
use App\Models\Furniture;
use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return redirect('/');
    }
    //index 
    public function index()
    {
        $cats = Furniture::all();
        return view('furni.index', compact('cats'));
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
        $cats = furniture::all();
        return view('furni.shop.shop', compact('cats'));
    }

    //faaltu ke function
    public function services()
    {
        return view('furni.services');
    }
    public function contact()
    {
        return view('furni.contact');
    }
    public function blog()
    {
        return view('furni.blog');
    }
    public function about()
    {
        return view('furni.about');
    }
    //user profile function
    public function userprofile()
    {
        return view('furni.user.profile');
    }

    public function form()
    {
        return view('form');
    }
    public function load(Request $request)
    {
        return response()->json(['html' => "hello hitesh"]);
    }
}
