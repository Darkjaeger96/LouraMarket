<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(){
        $featuredProducts = Product::where('trending', '1')->take(15)->get();
        $popularCategories = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featuredProducts', 'popularCategories'));
    } 

    public function category(){
        $category = Category::where('status', '0')->get();
        return view('frontend.category', compact('category'));
    }

    public function viewCategory($slug){
        if(Category::where('slug', $slug)->exists()){
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('category', 'products'));
        }else{
            return redirect('/')->with('status', "La categoría que estás buscando no existe.");
        }
    }

    public function viewProduct($catSlug, $prodSlug){
        if(Category::where('slug', $catSlug)->exists()){
            if(Product::where('slug', $prodSlug)->exists()){
                $products = Product::where('slug', $prodSlug)->first();
                return view('frontend.products.view', compact('products'));
            } else {
                return redirect('/')->with('status', "El enlace está roto...");
            }
        }  else {
            return redirect('/')->with('status', "No se ha encontrado la categoría deseada...");
        }
    }

    public function faq(){
        return view('frontend.faq');
    }

    public function listSearchProduct(){
        $products = Product::select('name')->where('status', '0')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }

        return $data;
    }

    public function searchProduct(Request $request){
        $foundProduct = $request->productName;
        if($foundProduct != ""){
            $product = Product::where("name","LIKE","%$foundProduct%")->first();
            if($product){
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }else{
                return redirect()->back()->with("status", "no hay productos que coincidan con su búsqueda");
            }
        }else{
            return redirect()->back();
        }
    }

    public function profile(){
        return view('frontend.profile');
    }
}
