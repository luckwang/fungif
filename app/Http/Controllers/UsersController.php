<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.edit', $user->id)->with('message', 'Update successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
}
