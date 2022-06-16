<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function addProduct(Request $request){
        $product_id = $request->input('product_id');
        $product_quantity = $request->input('product_quantity');

        if(Auth::check()){
            $product_check = Product::where('id', $product_id)->first();
            if($product_check){
                if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status' => $product_check->name . ' ya está añadido al carrito']);
                }else{
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    if($product_quantity > $product_check->quantity){
                        return response()->json(['status' => '¡No hay suficiente stock!']);           
                    }
                    $cartItem->prod_quantity = $product_quantity;
                    $cartItem->save();
                    return response()->json(['status' => '¡x' . $product_quantity .' ' . $product_check->name . ' añadido al carrito!']);
                }
               
            }
        }else{
            return response()->json(['status' => "Debes iniciar sesión para continuar..."]);
        }
    
    }
    public function viewCart(){
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartItems'));
    }

    public function updateCart(Request $request){
        $prod_id = $request->input('prod_id');
        $product_quantity = $request->input('prod_quantity');
        if(Auth::check()){
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_quantity = $product_quantity;
                $cart->update();
                return response()->json(['status'=> "Cantidad actualizada"]);
            }
        }
    }

    public function deleteProduct(Request $request){
        if(Auth::check()){
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()){
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
            return response()->json(['status' => "Producto Eliminado con éxito"]);

            }
        }else{
            return response()->json(['status' => "Debes iniciar sesión para continuar..."]);
        }

    }

    public function cartCounter(){
        $countCart = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count' => $countCart]);
    }

}
