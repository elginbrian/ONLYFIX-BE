<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


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
        $apiToken = Str::random(60);  
        $user->api_token = $apiToken;
        $user->save();

        return response()->json([
            'message' => 'Login successful.',
            'user' => $user,
            'api_token' => $apiToken, 
        ], 200);
    }

    return response()->json([
        'message' => 'Invalid credentials.',
    ], 401);
}


public function logout(Request $request)
{
    $apiToken = $request->query('api_token');

    if (!$apiToken) {
        return response()->json([
            'message' => 'API token is required.',
        ], 400);
    }

    $user = User::where('api_token', $apiToken)->first();

    if ($user) {
        $user->api_token = null;
        $user->save();

        return response()->json([
            'message' => 'Logged out successfully.',
        ], 200);
    }

    return response()->json([
        'message' => 'Invalid API token.',
    ], 401);
}


    public function currentUser(Request $request)
    {
        $apiToken = $request->query('api_token'); 

        if (!$apiToken) {
            return response()->json([
                'message' => 'API token is required.',
            ], 400);
        }

        $user = User::where('api_token', $apiToken)->first();

        if ($user) {
            return response()->json([
                'user' => $user,
            ], 200);
        }

        return response()->json([
            'message' => 'User not found or invalid token.',
        ], 401);
    }
}
