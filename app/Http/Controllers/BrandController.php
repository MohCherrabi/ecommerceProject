<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Region;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $b = 'brands';
    $nameTable = 'brands';

    // Check if search input is set in the request
    if ($request->has('search')) {
        // Perform the search
        $searchTerm = $request->input('search');
        $brands = Brand::where('brand', 'like', '%' . $searchTerm . '%')->paginate(10);
    } else {
        // If search input is not set, fetch all brands
        $brands = Brand::paginate(10);
    }

    return view('back-end.brands.index', ['brands' => $brands, 'b' => $b, 'nameTable' => $nameTable]);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $b = 'brands';
        $nameTable = 'brands';

        return view('back-end.brands.create',compact('b','nameTable'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        Brand::create($request->all());
        return redirect()->route('brands.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $brand = Brand::findOrFail($id);
        return view('back-end.brands.show',['brand'=>$brand]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $b = 'brands';
        $nameTable = 'brands';
        $brand = Brand::findOrFail($id);
        return view('back-end.brands.edit',['brand'=>$brand,'b'=>$b,'nameTable'=>$nameTable]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(BrandRequest $request, int $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->update($request->all());
        return redirect()->route('brands.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
