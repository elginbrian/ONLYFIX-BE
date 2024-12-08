<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Technician;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfileController extends Controller
{
    public function show($user_id)
    {
        try {
            $user = User::with(['technician', 'customer'])->findOrFail($user_id);
            
            $profileData = [
                'user' => $user,
            ];

            return response()->json([
                'message' => 'Profile retrieved successfully',
                'data' => $profileData,
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function update(Request $request, $user_id)
    {
        try {
            $validated = $request->validate([
                'username' => 'sometimes|string|max:255',
                'email' => 'sometimes|email|max:255',
                'password' => 'sometimes|string|min:6',
                'account_type' => 'sometimes|string|in:customer,technician',
                'phone_num' => 'sometimes|string|max:15',
                'address' => 'sometimes|string|max:255',
                'city' => 'sometimes|string|max:100',
                'price' => 'sometimes|numeric',
                'description' => 'sometimes|string',
                'rating' => 'sometimes|numeric|min:0|max:5',
            ]);

            $user = User::findOrFail($user_id);
            $user->update($validated);

            if ($validated['account_type'] === 'technician' && isset($validated['description'])) {
                $technicianData = [
                    'description' => $validated['description'] ?? $user->technician->description,
                    'price' => $validated['price'] ?? $user->technician->price,
                    'phone_num' => $validated['phone_num'] ?? $user->technician->phone_num,
                    'city' => $validated['city'] ?? $user->technician->city,
                    'rating' => $validated['rating'] ?? $user->technician->rating,
                ];

                $user->technician()->updateOrCreate(
                    ['user_id' => $user_id],
                    $technicianData
                );
            }

            if ($validated['account_type'] === 'customer' && isset($validated['address'])) {
                $customerData = [
                    'phone_num' => $validated['phone_num'] ?? $user->customer->phone_num,
                    'address' => $validated['address'] ?? $user->customer->address,
                    'city' => $validated['city'] ?? $user->customer->city,
                ];

                $user->customer()->updateOrCreate(
                    ['user_id' => $user_id],
                    $customerData
                );
            }

            return response()->json([
                'message' => 'Profile updated successfully',
                'data' => $user,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating profile',
                'error' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
