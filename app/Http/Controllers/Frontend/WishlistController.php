<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth; 
use App\Models\Wishlist;
use App\Models\Product;

class WishlistController extends Controller
{
    public function index(){
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlist'));
    }

    public function addWishlist(Request $request){
        if(Auth::check()){
            $product_id = $request->input('product_id');
            if(Product::find($product_id)){
                $wish = new Wishlist();
                $wish->product_id = $product_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => 'Producto Añadido a la lista de deseos']);

            } else {
                return response()->json(['status' => 'El producto no existe...']);
            }
        } else {
            return response()->json(['status' => "Debes iniciar sesión para continuar..."]);
        }
    }

    public function deleteWishItem(Request $request){
        if(Auth::check()){
            $product_id = $request->input('product_id');
            if(Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                $wishItem = Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $wishItem->delete();
            return response()->json(['status' => "Producto Eliminado de su lista de deseos"]);

            }
        }else{
            return response()->json(['status' => "Debes iniciar sesión para continuar..."]);
        }

    }

    public function wishlistCounter(){
        $countWish = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $countWish]);
    }
}
