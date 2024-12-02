<?php

namespace App\Http\Controllers;

use App\Models\OrderAttachment;
use Illuminate\Http\Request;

class OrderAttachmentController extends Controller
{
    public function index()
    {
        return OrderAttachment::all();
    }

    public function show($id)
    {
        return OrderAttachment::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'file_url' => 'required|url',
        ]);

        $attachment = OrderAttachment::create($request->all());
        return response()->json($attachment, 201);
    }

    public function update(Request $request, $id)
    {
        $attachment = OrderAttachment::findOrFail($id);
        $attachment->update($request->all());
        return response()->json($attachment, 200);
    }

    public function destroy($id)
    {
        OrderAttachment::destroy($id);
        return response()->json(null, 204);
    }
}
