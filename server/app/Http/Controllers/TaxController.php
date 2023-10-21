<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaxRequest;
use App\Http\Resources\TaxResource;
use App\Models\Tax;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Mengambil semua data tax
            $data = Tax::all();
            // Mengembalikan semua data tax
            return response()->json([
                'message' => 'Successful in getting all tax data',
                'data' => TaxResource::collection($data)
            ]);
        } catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TaxRequest $request)
    {
        try {
            // Membuat Tax
          $data = Tax::create($request->all());
            // Response sukses
            return response()->json([
                'message' => 'Tax saved successfully',
                'data' => new TaxResource($data)
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
            // Mencari data tax berdasarkan id
            $data = Tax::findOrFail($id);
            // Mengembalikan data tax dalam bentuk TaxResource
            return response()->json([
                'message' => 'Tax found successfully',
                'data'  => new TaxResource($data)

            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan di sini
            return response()->json(['message' => 'Tax not found'], 404);
        } catch (\Exception $e) {
            // Tangani pengecualian umum 
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(TaxRequest $request, string $id)
    {
        try {
            // Mencari data tax berdasarkan id
            $data = Tax::findOrFail($id);
            // Mengupdate data tax
            $data->update($request->all());
            // Response sukses
            return response()->json([
                'message' => 'Tax updated successfully',
                'data' => new TaxResource($data)
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan di sini
            return response()->json(['message' => 'Tax not found'], 404);
        } catch (\Exception $e) {
            // Tangani pengecualian umum lainnya
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Cari tax berdasarkan ID
            $data = Tax::findOrFail($id);
            // Hapus tax
            $data->delete();
            // Respons sukses
            return response()->json([
                'message' => 'Tax deleted successfully',
                'data' => new TaxResource($data)
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan di sini
            return response()->json(['message' => 'Tax not found'], 404);
        } catch (\Exception $e) {
            // Tangani pengecualian umum lainnya
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }
    
}
