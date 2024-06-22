<?php

namespace App\Http\Controllers;

use App\Http\Requests\orderRequest;
use App\Models\Region;
use App\Models\Order;
use App\Models\PaymentMode;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $o = 'orders';
        $nameTable = 'orders';
        // Check if search input is set in the request
    if ($request->has('search')) {
        // Perform the search
        $searchTerm = $request->input('search');
        $orders = Order::where('id', 'like', '%' . $searchTerm . '%')->paginate(10);
    } else {
        // If search input is not set, fetch all orders
        $orders = Order::paginate(10);
    }

        return view('back-end.orders.index',['orders' => $orders,'o'=>$o,'nameTable'=>$nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $o = 'orders';
        $nameTable = 'orders';

        $payment_modes = PaymentMode::all();
        $statuses = Status::all();
        $users = User::all();
        return view('back-end.orders.create',compact('payment_modes','users','statuses','o','nameTable'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(orderRequest $request)
    {
        // dd($request);
        Order::create($request->all());
        return redirect()->route('orders.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $order = Order::findOrFail($id);
        return view('back-end.orders.show',['order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $o = 'orders';
        $nameTable = 'orders';

        $payment_modes = PaymentMode::all();
        $statuses = Status::all();
        $users = User::all();
        $order = Order::findOrFail($id);
        return view('back-end.orders.edit',compact('payment_modes','users','statuses','order','o', 'nameTable'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(orderRequest $request, int $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect()->route('orders.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect()->route('orders.index');
    }
}
