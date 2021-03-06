<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use App\Subscription;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($lang, CustomerRequest $request)
    {
        return Customer::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($lang, Customer $customer)
    {
        //$subscriptions = Subscription::where('customer_id', $customer->id)->get();
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update($lang, CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return 200;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, Customer $customer)
    {
        return $customer->delete();
    }
}
