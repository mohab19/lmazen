<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerHistoryRequest;
use Illuminate\Http\Request;
use App\CustomerHistory;
use App\Product;

class CustomerHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerHistoryRequest $request)
    {
        $product = Product::where('id', $request->product_id)->first();

        $customer_history = CustomerHistory::create([
            'product_id'  => $request->product_id,
            'customer_id' => $request->customer_id,
            'quantity'    => $request->quantity,
            'amount'      => ($product->selling_price * $request->quantity)
        ]);

        $product->update(['quantity' => ($product->quantity - $request->quantity)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerHistory  $customerHistory
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerHistory $customerHistory)
    {
        return view('customers.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerHistory  $customerHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerHistory $customerHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerHistory  $customerHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerHistory $customerHistory)
    {
        $history = $customerHistory->update(['paid' => 1]);
        return 200;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerHistory  $customerHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerHistory $customerHistory)
    {
        //
    }
}
