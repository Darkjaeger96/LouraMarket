<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index(){
        //si el producto está agotado, al pagar, no hay nada que mostrar en los detalles del pedido
        $oldCartItems = Cart::where('user_id', Auth::id())->get();
        foreach($oldCartItems as $item){
            if(!Product::where('id', $item->prod_id)->where('quantity', '>=', $item->prod_quantity)->exists()){
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('cartItems'));
    }

    public function placeOrder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->country = $request->input('country');
        $order->state = $request->input('state');
        $order->city = $request->input('city');
        $order->pincode = $request->input('pincode');
        

        // Calcula el precio total
        $total = 0;
        $cartItems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems_total as $prod) {
            $total += $prod->products->selling_price * $prod->prod_quantity;
        }
        $order->total_price = $total;

        $order->tracking_num = 'trck'.rand(11111111,99999999).'n';
        $order->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'quantity' => $item->prod_quantity,
                'price' => $item->products->selling_price,
            ]);

            //actualiza la cantidad de existencias del producto
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->quantity =  $prod->quantity -  $item->prod_quantity;
            $prod->update();
        }

      
        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

    

        return redirect('/')->with('status', '¡Tu pedido ha sido realizado con éxito!');
    }
}
