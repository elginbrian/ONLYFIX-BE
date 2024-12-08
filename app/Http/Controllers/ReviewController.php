<?php
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ReviewController extends Controller
{
    public function index()
    {
        try {
            $reviews = Review::all();
            return response()->json([
                'message' => 'Reviews retrieved successfully.',
                'data' => $reviews
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve reviews.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $review = Review::findOrFail($id);
            return response()->json([
                'message' => 'Review retrieved successfully.',
                'data' => $review
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Review not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve review.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'order_id' => 'required|exists:orders,order_id',
                'technician_id' => 'required|exists:technicians,technician_id',
                'customer_id' => 'required|exists:customers,customer_id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string',
            ]);

            $review = Review::create($request->all());
            return response()->json([
                'message' => 'Review created successfully.',
                'data' => $review
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'error' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create review.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->update($request->all());
            return response()->json([
                'message' => 'Review updated successfully.',
                'data' => $review
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Review not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update review.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $review = Review::findOrFail($id);
            $review->delete();
            return response()->json([
                'message' => 'Review deleted successfully.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Review not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete review.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
