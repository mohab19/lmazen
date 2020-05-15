<?php

namespace App\Http\Controllers;

use App\UserRequest;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $requests = UserRequest::all();
        return view('requests.index', compact('requests'));
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
            $userRequest = UserRequest::create([
                'user_id' => auth()->user()->id,
                'request_type' => $request->request_type,
                'request_email' => $request->email,
                'request_description' => $request->comment,
                'get_price'     => in_array('QUOTE', $request->requestTypesChoices) ? 1 : 0,
                'recieve_docs'  => in_array('DOC', $request->requestTypesChoices) ? 1 : 0,
                'phone_contact' => in_array('PHONE_REMINDER', $request->requestTypesChoices) ? 1 : 0,
            ]);

            return response(200);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function show(UserRequest $userRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRequest $userRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRequest $userRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRequest $userRequest)
    {
        $userRequest->delete();
    }
}
