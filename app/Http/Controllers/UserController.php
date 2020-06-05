<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($lang, UserRequest $request)
    {
        $user = User::create([
            'name'     => $request->name,
            'mobile'   => $request->mobile,
            'email'    => $request->email,
            'salary'   => $request->salary,
            'password' => \Hash::make($request->password)
        ]);

        return 200;
    }

    public function activation($lang, User $user) {
        try {
            if($user->verified) {
                $update = User::where('id', $user->id)->update(['verified' => 0]);
                return response(0);
            } else {
                $update = User::where('id', $user->id)->update(['verified' => 1]);
                return response(1);
            }
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, User $user) {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function update($lang, UserRequest $request, User $user)
    {
        $user->update([
            'name'     => $request->name,
            'mobile'   => $request->mobile,
            'email'    => $request->email,
            'salary'   => $request->salary,
            'password' => \Hash::make($request->password)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, User $user) {
        try {
            $user->delete();
            return response(200);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }

}
