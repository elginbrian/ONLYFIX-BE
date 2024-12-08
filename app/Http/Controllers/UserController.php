<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($user_id)
    {
        return User::findOrFail($user_id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6',
        ]);

        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function destroy($user_id)
    {
        User::destroy($user_id);
        return response()->json(null, 204);
    }
}
