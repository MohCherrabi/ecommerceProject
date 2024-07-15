<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SubFamilie;
use App\Models\SubProduct;
use Gloudemans\Shoppingcart\Facades\Cart;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeContrller extends Controller
{
    public function home(){
        $products = DB::table('sub_families')
                        ->join('products', 'sub_families.id', '=', 'products.sub_familie_id')
                        ->join('order_details', 'products.id', '=', 'order_details.product_id')
                        ->whereNull('order_details.deleted_at')
                        ->select('products.*', DB::raw('SUM(order_details.quantity) as total_quantity_sold'))
                        ->groupBy('sub_families.id','products.id')
                        ->orderByDesc('total_quantity_sold')
                        ->get();
        $sub_families = DB::table('sub_families')
                        ->join('products', 'sub_families.id', '=', 'products.sub_familie_id')
                        ->join('order_details', 'products.id', '=', 'order_details.product_id')
                        ->whereNull('order_details.deleted_at')
                        ->select('products.*', DB::raw('SUM(order_details.quantity) as total_quantity_sold'))
                        ->groupBy('sub_families.id','products.id')
                        ->orderByDesc('total_quantity_sold')
                        ->get()
                        ->pluck('sub_familie_id');

        $sub_products = SubProduct::all();
        $subFamilies = SubFamilie::all();
        $sub_families = SubFamilie::whereIn('id',$sub_families)->get();
        $productsForModal = Product::all();
        $latestProducts = Product::orderBy('id','desc')->limit(100)->get();
        $brands = Brand::all();
        $AllProducts = Product::all();

        $blogs = Blog::orderByDesc('id')->get();
        return view('front-end.index', compact('products','subFamilies','sub_families','productsForModal','latestProducts','sub_products','brands','AllProducts','blogs'));
    }

    public function shopingCart(){
        $idProduct = Cart::content()->pluck('id')->toArray();
        $products = Product::whereIn('id',$idProduct)->pluck('sub_familie_id')->toArray();
        $products = Product::whereIn('sub_familie_id',$products)->whereNotIn('id', $idProduct)->get();
        return view('front-end.shoping_cart',compact('products'));
    }

    public function productsList(){
        $products = Product::all();
        return view('front-end.products_list',compact('products'));
    }
    public function productSingle(){
        return view('front-end.product_single');
    }
}
