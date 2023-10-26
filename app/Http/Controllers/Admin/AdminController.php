<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function home()
    {
        $data = Products::count();
        $userCount = DB::table('users')->where('role', 'user')->count();
        //dd($data);
        return view('admin.Dashboard.index', compact('data', 'userCount'));
    }
   
    public function index(){
       
        return view('admin.user.login');
    }
    
    public function register(){
        return view('admin.user.register');
    }

    public function store(Request $request){
        $request->validate([   
            'email' => 'required|email|unique:users|max:255',
            'number' => 'required|unique:users|', 
            [
                'email.unique' => 'email already exists',
                'email.email' => 'Please enter a valid email.',
                'number.unique' => 'this number is already registered'
            ] 
        ]);
     $user=new User();
     $user->name = $request->name;
     $user->email = $request->email;
     $user->password = $request->password;
     $user->number = $request->number;
     $user->save();
     return redirect('/furni/login');
    }
//login function
    public function log(Request $request){
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            $user = Auth::User();
            return redirect('/home');
           }
        return back()->with('msg','please enter valid details');

    }
  
    public function profile(){
        $user=Auth::User();
        $data=User::find( $user->id);
        return view('admin.profile',compact('data'));
    }
  
        public function adminlogout(){
             Auth::logout();
            return redirect('/');
        }

        public function user(){
          return view('admin.users');
        }


}
