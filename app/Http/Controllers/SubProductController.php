<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubProductRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SubProduct;
use App\Models\SubFamilie;
use App\Models\Unit;
use Illuminate\Http\Request;

class SubProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $spr = 'sub_product';
        $nameTable = 'sub_products';
        // Check if search input is set in the request
    if ($request->has('search')) {
        // Perform the search
        $searchTerm = $request->input('search');
        $sub_products = SubProduct::where('designation', 'like', '%' . $searchTerm . '%')->paginate(10);
    } else {
        // If search input is not set, fetch all sub_products
        $sub_products = SubProduct::paginate(10);
    }
        return view('back-end.sub_products.index',['sub_products' => $sub_products, 'spr' => $spr,'nameTable'=>$nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $spr = 'sub_product';
        $nameTable = 'sub_products';
        $units = Unit::all();
        $brands = Brand::all();
        $sub_families= SubFamilie::all();
        $products= Product::all();
        return view('back-end.sub_products.create',compact('units','brands', 'sub_families','spr','nameTable','products'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(SubProductRequest $request)
    {
        $sub_product = $request->all();
        // dd($sub_product);
        if($request->hasFile('image')){

            $sub_product['image'] = $request->file('image')->store('imageSubProduct', 'public');
        }
        SubProduct::create($sub_product);
        return redirect()->route('sub_products.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $sub_product = SubProduct::findOrFail($id);
        return view('back-end.sub_products.show',compact('sub_product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $spr = 'sub_product';

        $units = Unit::all();
        $brands = Brand::all();
        $sub_families= SubFamilie::all();
        $products= Product::all();
        $sub_product = SubProduct::findOrFail($id);
        return view('back-end.sub_products.edit',compact('units','brands', 'sub_families','sub_product','spr','products'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(SubProductRequest $request, int $id)
    {
        $sub_product = $request->all();
        if($request->hasFile('image')){
        $sub_product['image'] = $request->file('image')->store('imageSubProduct', 'public');
        }
        $SubProduct = SubProduct::findOrFail($id);
        $SubProduct->update($sub_product);
        return redirect()->route('sub_products.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $SubProduct = SubProduct::findOrFail($id);
        $SubProduct->delete();
        return redirect()->route('sub_products.index');
    }
}
