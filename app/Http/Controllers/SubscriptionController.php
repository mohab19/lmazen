<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use Illuminate\Http\Request;
use App\Subscription;
use App\Customer;
use App\System;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::all();
        return view("subscriptions.index", compact("subscriptions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $systems   = System::all();
        $customers = Customer::all();
        return view("subscriptions.create", compact("systems", "customers"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($lang, SubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show($lang, Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, Subscription $subscription)
    {
        $systems   = System::all();
        $customers = Customer::all();
        return view("subscriptions.edit", compact("subscription", "systems", "customers"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update($lang, SubscriptionRequest $request, Subscription $subscription)
    {
        $subscription->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, Subscription $subscription)
    {
        $subscription->delete();
    }

    public function pay_subscription($lang, Subscription $subscription)
    {
        if($subscription->is_paid == 1) {
            $subscription->update(['is_paid' => 0]);
        } else {
            $subscription->update(['is_paid' => 1]);
        }
    }

}
