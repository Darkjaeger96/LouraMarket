<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function view($id){
       $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
       return view('frontend.orders.view', compact('orders')); 
    }

    public function saveProfile(Request $request){
        $user_id = Order::where('user_id', Auth::id())->get();
        $user = Auth::user($user_id);

        $user->name = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->country = $request->input('country');
        $user->state = $request->input('state');
        $user->city = $request->input('city');
        $user->pincode = $request->input('pincode');
        $user->save();

        return redirect('/my-profile')->with('status', '¡Tu perfil ha sido Actualizado!');
        
    }
}
