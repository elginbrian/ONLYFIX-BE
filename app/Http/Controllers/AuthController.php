<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password), 
            ]);

            return response()->json([
                'message' => 'User registered successfully.',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            Log::error("Registration Error: " . $e->getMessage());
            return response()->json([
                'message' => 'Failed to register user.',
                'error' => 'An error occurred.',
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            return response()->json([
                'message' => 'Login successful.',
                'user' => $user,
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid credentials.',
        ], 401);
    }

    public function logout(Request $request)
    {
        return response()->json([
            'message' => 'Logged out successfully.',
        ], 200);
    }

    public function currentUser(Request $request)
    {
        $user = $request->user();

        if ($user) {
            return response()->json([
                'user' => $user,
            ], 200);
        }

        return response()->json([
            'message' => 'No user logged in.',
        ], 401);
    }
}
