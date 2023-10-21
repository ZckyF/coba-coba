<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutletRequest;
use App\Http\Resources\OutletDetailResource;
use App\Http\Resources\OutletResource;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Menagambil semua data
            $data = Outlet::all();
            // Mengembalikan data
            return response()->json([
                'message' => 'Successful in getting all outltes data',
                'data' =>  OutletResource::collection($data)
            ]);
        }
        catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OutletRequest $request)
    {
        try {
            // Membuat Outlet
           $data = Outlet::create($request->all());
            // Response Sukses
            return response()->json([
                'message' => 'Outlet saved successfully',
                'data' => new OutletDetailResource($data)
            ], 200);
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
            $data = Outlet::findOrFail($id);
            // Mengembalikan data
            return response()->json([
                'message' => 'Outlet found successfully',
                'data' => new OutletDetailResource($data)
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan di sini
            return response()->json(['message' => 'Outlet not found'], 404);
        } catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OutletRequest $request, string $id)
    {
        try {
            // Mencari data berdasarkan id
            $data = Outlet::findOrFail($id);
            //  Mengupdate Outlet
            $data->update($request->all());
            // Response sukses
            return response()->json([
                'message' => 'Outlet updated successfully',
                'data' => new OutletDetailResource($data)
            ,
        ], 201);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan di sini
            return response()->json(['message' => 'Outlet not found'], 404);
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
            $data = Outlet::findOrFail($id);
            // Hapus outlet
            $data->delete();
            // Respons sukses
            return response()->json([
                'message' => 'Outlet deleted successfully',
                'data' => new OutletDetailResource($data)
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan di sini
            return response()->json(['message' => 'Outlet not found'], 404);
        } catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }
}
