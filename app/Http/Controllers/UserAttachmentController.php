<?php
namespace App\Http\Controllers;

use App\Models\UserAttachment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserAttachmentController extends Controller
{
    public function index()
    {
        try {
            $attachments = UserAttachment::all();
            return response()->json([
                'message' => 'User attachments retrieved successfully.',
                'data' => $attachments
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve user attachments.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $attachment = UserAttachment::findOrFail($id);
            return response()->json([
                'message' => 'User attachment retrieved successfully.',
                'data' => $attachment
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User attachment not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve user attachment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,user_id',
                'file_url' => 'required|url',
            ]);

            $attachment = UserAttachment::create($request->all());
            return response()->json([
                'message' => 'User attachment created successfully.',
                'data' => $attachment
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'error' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create user attachment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $attachment = UserAttachment::findOrFail($id);
            $attachment->update($request->all());
            return response()->json([
                'message' => 'User attachment updated successfully.',
                'data' => $attachment
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User attachment not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update user attachment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $attachment = UserAttachment::findOrFail($id);
            $attachment->delete();
            return response()->json([
                'message' => 'User attachment deleted successfully.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User attachment not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete user attachment.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
