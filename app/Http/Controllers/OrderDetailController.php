<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDetailRequest;
use App\Http\Requests\orderRequest;
use App\Models\Order;
use App\Models\Region;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $od = 'orders_details';
        $nameTable = 'orders_details';
        // Check if search input is set in the request
    if ($request->has('search')) {
        // Perform the search
        $searchTerm = $request->input('search');
        $orders_details = OrderDetail::where('id', 'like', '%' . $searchTerm . '%')->paginate(10);
    } else {
        // If search input is not set, fetch all orders_details
        $orders_details = OrderDetail::paginate(10);
    }

        return view('back-end.orders_details.index',['orders_details' => $orders_details,'od'=>$od,'nameTable'=>$nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $od = 'orders_details';
        $nameTable = 'orders_details';

        $products  = Product::all();
        $orders  = Order::all();
        return view('back-end.orders_details.create',compact('products', 'orders','od','nameTable'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderDetailRequest $request)
    {
        OrderDetail::create($request->all());
        return redirect()->route('orders_details.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $order_detail = OrderDetail::findOrFail($id);
        return view('back-end.orders_details.show',['order_detail'=>$order_detail]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $od = 'orders_details';
        $nameTable = 'orders_details';

        $products  = Product::all();
        $orders  = Order::all();
        $order_details = OrderDetail::findOrFail($id);
        return view('back-end.orders_details.edit',['order_details'=>$order_details, 'orders'=>$orders,'products'=>$products,'od'=>$od,'nameTable']);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(OrderDetailRequest $request, int $id)
    {
        $order_details = OrderDetail::findOrFail($id);
        $order_details->update($request->all());
        return redirect()->route('orders_details.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $order_details = OrderDetail::findOrFail($id);
        $order_details->delete();
        return redirect()->route('orders_details.index');
    }
}
