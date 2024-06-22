<?php

namespace App\Http\Controllers;

use App\Http\Requests\orderRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SubFamilie;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pr = 'product';
        $nameTable = 'products';
        // Check if search input is set in the request
    if ($request->has('search')) {
        // Perform the search
        $searchTerm = $request->input('search');
        $products = Product::where('designation', 'like', '%' . $searchTerm . '%')->paginate(10);
    } else {
        // If search input is not set, fetch all products
        $products = Product::paginate(10);
    }
        return view('back-end.products.index',['products' => $products, 'pr' => $pr,'nameTable'=>$nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pr = 'product';
        $nameTable = 'products';
        $units = Unit::all();
        $brands = Brand::all();
        $sub_families= SubFamilie::all();
        return view('back-end.products.create',compact('units','brands', 'sub_families','pr','nameTable'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = $request->all();
        $product['special_offer'] = $request->has('special_offer');
        if($request->hasFile('image')){

            $product['image'] = $request->file('image')->store('imageProduct', 'public');
        }
        Product::create($product);
        return redirect()->route('products.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $product = Product::findOrFail($id);
        return view('back-end.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $pr = 'product';

        $units = Unit::all();
        $brands = Brand::all();
        $sub_families= SubFamilie::all();
        $product = Product::findOrFail($id);
        return view('back-end.products.edit',compact('units','brands', 'sub_families','product','pr'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(ProductRequest $request, int $id)
    {
        $product = $request->all();
        if($request->hasFile('image')){
        $product['image'] = $request->file('image')->store('imageProduct', 'public');
        }
        $Product = Product::findOrFail($id);
        $Product->update($product);
        return redirect()->route('products.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $Product = Product::findOrFail($id);
        $Product->delete();
        return redirect()->route('products.index');
    }
}
