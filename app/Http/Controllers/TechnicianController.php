<?php
namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TechnicianController extends Controller
{
    public function index()
    {
        try {
            $technicians = Technician::all();
            return response()->json([
                'message' => 'Technicians retrieved successfully.',
                'data' => $technicians
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve technicians.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $technician = Technician::findOrFail($id);
            return response()->json([
                'message' => 'Technician retrieved successfully.',
                'data' => $technician
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Technician not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to retrieve technician.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,user_id',
                'description' => 'required',
                'price' => 'required|numeric',
            ]);

            $technician = Technician::create($request->all());
            return response()->json([
                'message' => 'Technician created successfully.',
                'data' => $technician
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'error' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create technician.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $technician = Technician::findOrFail($id);
            $technician->update($request->all());
            return response()->json([
                'message' => 'Technician updated successfully.',
                'data' => $technician
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Technician not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to update technician.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $technician = Technician::findOrFail($id);
            $technician->delete();
            return response()->json([
                'message' => 'Technician deleted successfully.'
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Technician not found.',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete technician.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
