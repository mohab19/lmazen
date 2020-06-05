<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SupplierAccount;

class SupplierAccountController extends Controller
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
    public function store($lang, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SupplierAccount  $supplierAccount
     * @return \Illuminate\Http\Response
     */
    public function show($lang, SupplierAccount $supplierAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SupplierAccount  $supplierAccount
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, SupplierAccount $supplierAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SupplierAccount  $supplierAccount
     * @return \Illuminate\Http\Response
     */
    public function update($lang, Request $request, SupplierAccount $supplierAccount)
    {
        if($request->paid > $supplierAccount->remain) {
            return response()
            ->json(['status' => 402, 'message' => 'Paid amount can not be greater then remain']);
        } else {
            $update = $supplierAccount->update([
                'paid'   => $request->paid,
                'remain' => $supplierAccount->remain - $request->paid,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SupplierAccount  $supplierAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, SupplierAccount $supplierAccount)
    {
        //
    }
}
