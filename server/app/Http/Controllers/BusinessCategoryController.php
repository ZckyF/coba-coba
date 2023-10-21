<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessCategoryRequest;
use App\Http\Resources\BusinessCategoryResource;
use App\Models\BusinessCategory;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
        // Mengambil semua data
        $data = BusinessCategory::all();
        // Mengembalikan data
        return response()->json([
            'message' => 'Successful in getting all business categories data',
            'data' => BusinessCategoryResource::collection($data)
        ]);
        } catch (\Exception $e) {
        // Tangani pengecualian umum
        return response()->json(['message' => 'An error occurred'], 500);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessCategoryRequest $request)
    {      
        try {
            // Membuat Business Category
            $businessCategory = BusinessCategory::create($request->all());

            // Response sukses dengan data yang baru saja dibuat
            return response()->json([
                'message' => 'Business category saved successfully',
                'data' => new BusinessCategoryResource($businessCategory) 
            ], 201);
        } catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            // Mencari berdasarkan id
            $data = BusinessCategory::findOrFail($id);
            // Mengembalikan data dengan pesan sukses
            return response()->json([
                'message' => 'Business category found successfully',
                'data' => new BusinessCategoryResource($data)
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan
            return response()->json(['message' => 'Business category not found'], 404);
        } catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred'], 500);
        }      
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessCategoryRequest $request, string $id)
    {
        try {
            // Mencari data berdasarkan id
            $data = BusinessCategory::findOrFail($id);
            //  Mengupdate Business Category
            $data->update($request->all());
            // Response sukses
            return response()->json([
                'message' => 'Business category updated successfully',
                'data' => new BusinessCategoryResource($data)
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan di sini
            return response()->json(['message' => 'Business category not found'], 404);
        } catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred'], 500);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Cari bisnis berdasarkan ID
            $data = BusinessCategory::findOrFail($id);
            // Hapus business category
            $data->delete();
            // Respons sukses
            return response()->json([
                'message' => 'Business category deleted successfully',
                'data' => new BusinessCategoryResource($data)
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan di sini
            return response()->json(['message' => 'Business category not found'], 404);
        } catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }
}
