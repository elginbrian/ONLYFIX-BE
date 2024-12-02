<?php

namespace App\Http\Controllers;

use App\Models\UserAttachment;
use Illuminate\Http\Request;

class UserAttachmentController extends Controller
{
    public function index()
    {
        return UserAttachment::all();
    }

    public function show($id)
    {
        return UserAttachment::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'file_url' => 'required|url',
        ]);

        $attachment = UserAttachment::create($request->all());
        return response()->json($attachment, 201);
    }

    public function update(Request $request, $id)
    {
        $attachment = UserAttachment::findOrFail($id);
        $attachment->update($request->all());
        return response()->json($attachment, 200);
    }

    public function destroy($id)
    {
        UserAttachment::destroy($id);
        return response()->json(null, 204);
    }
}
