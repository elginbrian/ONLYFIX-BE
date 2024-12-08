<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderAttachment;
use App\Models\Review;
use App\Models\Technician;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderManagementController extends Controller
{
    public function index(Request $request)
    {
        try {
            $orders = Order::with(['customer', 'technician', 'attachments', 'reviews']);

            if ($request->has('customer_id')) {
                $orders = $orders->where('customer_id', $request->customer_id);
            }

            if ($request->has('technician_id')) {
                $orders = $orders->where('technician_id', $request->technician_id);
            }

            $orders = $orders->get();

            return response()->json([
                'message' => 'Orders retrieved successfully',
                'data' => $orders,
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Orders not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function show($order_id)
    {
        try {
            $order = Order::with(['customer', 'technician', 'attachments', 'reviews'])->findOrFail($order_id);

            return response()->json([
                'message' => 'Order retrieved successfully',
                'data' => $order,
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Order not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,user_id',
            'technician_id' => 'required|exists:technicians,user_id',
            'date' => 'required|date',
            'status' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        try {
            $order = Order::create($validated);

            return response()->json([
                'message' => 'Order created successfully',
                'data' => $order,
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating order',
                'error' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Request $request, $order_id)
    {
        $validated = $request->validate([
            'status' => 'sometimes|string',
            'total_price' => 'sometimes|numeric',
        ]);

        try {
            $order = Order::findOrFail($order_id);

            $order->update($validated);

            return response()->json([
                'message' => 'Order updated successfully',
                'data' => $order,
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Order not found',
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating order',
                'error' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy($order_id)
    {
        try {
            $order = Order::findOrFail($order_id);
            $order->delete();

            return response()->json([
                'message' => 'Order deleted successfully',
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Order not found',
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting order',
                'error' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function addAttachment(Request $request, $order_id)
    {
        $validated = $request->validate([
            'file_url' => 'required|url',
            'uploaded_at' => 'required|date',
        ]);

        try {
            $order = Order::findOrFail($order_id);

            $attachment = $order->attachments()->create($validated);

            return response()->json([
                'message' => 'Attachment added successfully',
                'data' => $attachment,
            ], Response::HTTP_CREATED);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Order not found',
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error adding attachment',
                'error' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function addReview(Request $request, $order_id)
    {
        $validated = $request->validate([
            'technician_id' => 'required|exists:technicians,user_id',
            'customer_id' => 'required|exists:customers,user_id',
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string',
            'review_date' => 'required|date',
        ]);

        try {
            $order = Order::findOrFail($order_id);

            $review = $order->reviews()->create($validated);

            return response()->json([
                'message' => 'Review added successfully',
                'data' => $review,
            ], Response::HTTP_CREATED);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Order not found',
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error adding review',
                'error' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
