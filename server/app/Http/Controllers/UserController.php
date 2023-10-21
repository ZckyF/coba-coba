<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Melakukan pengecekan role, agar hasil data yang dikembalikan berbeda
            if (Auth::user()->role == "admin") {
                // Jika pengguna adalah admin, ambil semua pengguna dengan informasi outlet
                $data = User::with('outlet:id,business_name')->get();
            } else {
                // Jika pengguna adalah pemilik outlet, ambil hanya pengguna dengan peran "outlet employes" dengan informasi outlet
                $data = User::with('outlet:id,business_name')->where('role', '=', 'outlet employes')->get();
            }
            
            // Mengembalikan data dalam bentuk koleksi UserResource
            return response()->json([
                'message' => 'Successful in getting all users data',
                'data' =>  UserResource::collection($data)
            ]);
        } catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            $image = null;
            if ($request->hasFile('file')) {
                // Upload file
                $fileName = $this->generateRandomString();
                $extension = $request->file('file')->getClientOriginalExtension();
                $image = $fileName . '.' . $extension;
                
                Storage::putFileAs('image', $request->file('file'), $image);
            }
            // Anda bisa memperbarui langsung array data pada request.
            $request->merge([
                'image' => $image,
                'password' => Hash::make($request->input('password'))
            ]);
            
            // Membuat User
            $data = User::create($request->all());
            // Response sukses
            return response()->json([
                'message' => 'User saved successfully',
                'data' => new UserResource($data)
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
            // Mencari data berdasarkan id
            $data = User::with('outlet:id,business_name')->findOrFail($id);
            
            // Response sukses
            return response()->json([
                'message' => 'User found successfully',
                'data' => new UserResource($data)
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan di sini
            return response()->json(['message' => 'User not found'], 404);
        } catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        try {
            // Mencari data berdasarkan id
            $data = User::findOrFail($id);
    
            // Mengelola perubahan alamat email
            if ($request->filled('email') && $request->email !== $data->email) {                  
                // Jika email diubah, pastikan itu unik
                $request->validate([
                    'email' => 'required|email|unique:users,email|max:255',
                ]);
            } else {
                // Jika email tidak diubah, abaikan aturan unik untuk email
                $request['email'] = $data->email;
            }
    
            // Menghash Password jika ada perubahan
            if ($request->filled('password')) {
                $request['password'] = Hash::make($request['password']);
            } else {
                // Jika password tidak diubah, maka gunakan password yang ada di database
                $request['password'] = $data->password;
            }
    
            // Mengelola perubahan gambar profil
            if ($request->hasFile('file')) {
                $image = $request->file('file'); // Perbaiki pengambilan nama file menjadi 'file'
                $fileName = $this->generateRandomString();
                $extension = $request->file('file')->extension(); // Perbaiki pengambilan ekstensi file
                $imagePath = 'image/';
    
                // Simpan gambar baru menggunakan Storage::putFileAs
                Storage::putFileAs($imagePath, $image, $fileName . '.' . $extension);
    
                // Hapus gambar lama jika ada
                if ($data->image) {
                    // Hapus gambar lama menggunakan Storage::delete
                    Storage::delete($imagePath . $data->image);
                }
    
                // Update field 'image' di database
                $data->image = $fileName . '.' . $extension;
            } else {
                $data->image = null;
            }
            // Mengupdate data user
            $data->update($request->except('file')); // Exclude 'file' field
                
            // Response sukses
            return response()->json([
                'message' => 'User updated successfully',
                'data' => new UserResource($data)
            ], 200); // Gunakan kode status 200 untuk pembaruan yang berhasil
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan di sini
            return response()->json(['message' => 'User not found'], 404);
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
            // Cari user berdasarkan ID
            $data = User::findOrFail($id);
    
            // Hapus gambar terkait jika ada
            
            if ($data->image) {
                $imagePath = 'image/' . $data->image; 
                   
                // Hapus gambar menggunakan Storage::delete
                Storage::delete($imagePath);
            }
            // Hapus user
            $data->delete(); 
            // Respons sukses
            return response()->json([
                'message' => 'User deleted successfully',
                'data' => new UserResource($data)
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangani kasus ketika data tidak ditemukan di sini
            return response()->json(['message' => 'User not found'], 404);
        } catch (\Exception $e) {
            // Tangani pengecualian umum 
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }
    

    function generateRandomString($length = 30) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
