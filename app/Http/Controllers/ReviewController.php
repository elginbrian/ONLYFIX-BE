<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return Review::all();
    }

    public function show($id)
    {
        return Review::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'technician_id' => 'required|exists:technicians,technician_id',
            'customer_id' => 'required|exists:customers,customer_id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = Review::create($request->all());
        return response()->json($review, 201);
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->update($request->all());
        return response()->json($review, 200);
    }

    public function destroy($id)
    {
        Review::destroy($id);
        return response()->json(null, 204);
    }
}
