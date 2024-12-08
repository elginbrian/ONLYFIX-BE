<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\UserAttachment;
use App\Models\OrderAttachment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AttachmentController extends Controller
{
    public function getUserAttachments($user_id)
    {
        try {
            $user = User::findOrFail($user_id);
            $attachments = $user->attachments;

            return response()->json([
                'message' => 'User attachments retrieved successfully',
                'data' => $attachments,
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function getOrderAttachments($order_id)
    {
        try {
            $order = Order::findOrFail($order_id);
            $attachments = $order->attachments;

            return response()->json([
                'message' => 'Order attachments retrieved successfully',
                'data' => $attachments,
            ], Response::HTTP_OK);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Order not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    public function storeUserAttachment(Request $request, $user_id)
    {
        $validated = $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:10240',
        ]);

        try {
            $user = User::findOrFail($user_id);
            $path = $request->file('file')->store('user_attachments', 'public');

            $attachment = new UserAttachment([
                'user_id' => $user_id,
                'file_url' => Storage::url($path),
                'uploaded_at' => now(),
            ]);
            $attachment->save();

            return response()->json([
                'message' => 'User attachment added successfully',
                'data' => $attachment,
            ], Response::HTTP_CREATED);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User not found',
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error uploading user attachment',
                'error' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function storeOrderAttachment(Request $request, $order_id)
    {
        $validated = $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,docx|max:10240',
        ]);

        try {
            $order = Order::findOrFail($order_id);
            $path = $request->file('file')->store('order_attachments', 'public');

            $attachment = new OrderAttachment([
                'order_id' => $order_id,
                'file_url' => Storage::url($path),
                'uploaded_at' => now(),
            ]);
            $attachment->save();

            return response()->json([
                'message' => 'Order attachment added successfully',
                'data' => $attachment,
            ], Response::HTTP_CREATED);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Order not found',
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error uploading order attachment',
                'error' => $e->getMessage(),
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
