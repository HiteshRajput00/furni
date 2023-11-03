<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BillingDetails;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function home()
    {
    
        $userCount = DB::table('users')->where('role', 'user')->count();
        $orders = Order::all();
        foreach($orders as $od){
            $price[] =$od->totalamount;
            $data[] =array_sum(explode(',', $od->variation_qty)); 
        }
        $lastMonthEarnings = Order::whereBetween('created_at', [
            now()->startOfMonth(),
            now()->endOfMonth()    
        ])->sum('totalamount');

        $lastMonthOrder = Order::whereBetween('created_at',
        [
            now()->startOfMonth(),
            now()->endOfMonth()  
        ])->get();

        // $customers = BillingDetails::with('Orders')->get();
         //dd($data);
        return view('admin.Dashboard.index', compact('data','orders', 'userCount','price','lastMonthEarnings','lastMonthOrder'));
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
       
        $users = User::where('role','user')->get();
        
        return view('admin.profile.index',compact('users'));
    }
  
        public function adminlogout(){
             Auth::logout();
            return redirect('/');
        }
 
        public function orders(){
            $orders = Order::all();
            return view('admin.details.orders', compact('orders'));
        }


}
