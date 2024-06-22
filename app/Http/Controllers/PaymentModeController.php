<?php

namespace App\Http\Controllers;

use App\Http\Requests\orderRequest;
use App\Http\Requests\PaymentModeRequest;
use App\Models\Region;
use App\Models\PaymentMode;
use Illuminate\Http\Request;

class PaymentModeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $p = 'payment_modes';
        $nameTable = 'payment_modes';
       // Check if search input is set in the request
    if ($request->has('search')) {
        // Perform the search
        $searchTerm = $request->input('search');
        $payment_modes = PaymentMode::where('payment_mode', 'like', '%' . $searchTerm . '%')->paginate(10);
    } else {
        // If search input is not set, fetch all payment_modes
        $payment_modes = PaymentMode::paginate(10);
    }

        return view('back-end.payment_modes.index',['payment_modes' => $payment_modes,'p'=>$p,'nameTable'=>$nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $p = 'payment_modes';
        $nameTable = 'payment_modes';

        return view('back-end.payment_modes.create',compact('p','nameTable'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentModeRequest $request)
    {
        PaymentMode::create($request->all());
        return redirect()->route('payment_modes.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $order_detail = PaymentMode::findOrFail($id);
        return view('back-end.payment_modes.show',['order_detail'=>$order_detail]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $p = 'payment_modes';
        $nameTable = 'payment_modes';

        $order_detail = PaymentMode::findOrFail($id);
        return view('back-end.payment_modes.edit',['order_detail'=>$order_detail,'p'=>$p,'nameTable']);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(PaymentModeRequest $request, int $id)
    {
        $order_detail = PaymentMode::findOrFail($id);
        $order_detail->update($request->all());
        return redirect()->route('payment_modes.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $order_detail = PaymentMode::findOrFail($id);
        $order_detail->delete();
        return redirect()->route('payment_modes.index');
    }
}
