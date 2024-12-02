<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    public function index()
    {
        return Technician::all();
    }

    public function show($id)
    {
        return Technician::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $technician = Technician::create($request->all());
        return response()->json($technician, 201);
    }

    public function update(Request $request, $id)
    {
        $technician = Technician::findOrFail($id);
        $technician->update($request->all());
        return response()->json($technician, 200);
    }

    public function destroy($id)
    {
        Technician::destroy($id);
        return response()->json(null, 204);
    }
}
