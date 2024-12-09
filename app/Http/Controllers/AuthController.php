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
    // Register User
    public function register(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Return validation error if any
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Create user without using Laravel's Auth
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hashing the password manually
            ]);

            return response()->json([
                'message' => 'User registered successfully.',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            // Log error and return failure response
            Log::error("Registration Error: " . $e->getMessage());
            return response()->json([
                'message' => 'Failed to register user.',
                'error' => 'An error occurred.',
            ], 500);
        }
    }

    // Login User (without Auth facade)
    public function login(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Return validation error if any
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Manually check if user exists and password is correct
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // You can manage your own session/token here if needed

            return response()->json([
                'message' => 'Login successful.',
                'user' => $user,
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid credentials.',
        ], 401);
    }

    // Logout User
    public function logout(Request $request)
    {
        // If you're managing sessions or tokens, clear them here.
        // As we're not using token-based Auth or sessions here, this is just an example.
        return response()->json([
            'message' => 'Logged out successfully.',
        ], 200);
    }

    // Get Current User
    public function currentUser(Request $request)
    {
        // Assuming you have some session or custom logic to know the user is logged in
        // If the user is stored in session or a token, retrieve the user here.
        // For simplicity, we assume we have a logged-in user stored in the request
        $user = $request->user(); // If using custom auth logic like custom token/session storage

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
