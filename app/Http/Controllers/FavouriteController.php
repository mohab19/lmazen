<?php

namespace App\Http\Controllers;

use App\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
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
    public function store(Request $request) {
        try {
            $data = $request->input();
            $favourite = Favourite::create([
                'user_id' => auth()->user()->id,
                'favourite_type' => $data['type'],
                'favourite_id' => $data['id']
            ]);
            return response(200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function show(favourite $favourite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function edit(favourite $favourite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favourite $favourite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\favourite  $favourite
     * @return \Illuminate\Http\Response
     */
    public function destroy(favourite $favourite)
    {
        //
    }
}
