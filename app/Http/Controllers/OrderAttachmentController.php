<?php

namespace App\Http\Controllers;

use App\Models\OrderAttachment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OrderAttachmentController extends Controller
{
    public function index()
    {
        try {
            $attachments = OrderAttachment::all();
            return response()->json([
                'message' => 'Order attachments retrieved successfully.',
                'data' => $attachments
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve order attachments.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $attachment = OrderAttachment::findOrFail($id);
            return response()->json([
                'message' => 'Order attachment retrieved successfully.',
                'data' => $attachment
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Order attachment not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve order attachment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'order_id' => 'required|exists:orders,order_id',
                'file_url' => 'required|url',
            ]);

            $attachment = OrderAttachment::create($request->all());
            return response()->json([
                'message' => 'Order attachment created successfully.',
                'data' => $attachment
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'error' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create order attachment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $attachment = OrderAttachment::findOrFail($id);
            $attachment->update($request->all());
            return response()->json([
                'message' => 'Order attachment updated successfully.',
                'data' => $attachment
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Order attachment not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update order attachment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $attachment = OrderAttachment::findOrFail($id);
            $attachment->delete();
            return response()->json([
                'message' => 'Order attachment deleted successfully.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Order attachment not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete order attachment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
