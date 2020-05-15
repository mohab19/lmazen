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
        return view('admin.users.users', compact('users'));
    }

    public function activation(User $user) {
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
    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserRequest  $userRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->input();

        $User = User::where('id', $user->id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
        ]);

        return response(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        try {
            $user->delete();
            return response(200);
        } catch (\Exception $e) {
            return response(['message' => $e->getMessage()], 400);
        }
    }

}
