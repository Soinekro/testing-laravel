<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        $user = User::create($request->all());
        return response($user,200);
    }

    public function index()
    {
        $users = User::all();
        return response($users,200);
    }

    public function show(User $user)
    {
        return response($user,200);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response($user,200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response(null,204);
    }
}
