<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function login(AuthenticationRequest $request)
    {
        try {
            // Temukan pengguna berdasarkan alamat email
            $user = User::where('email', $request->email)->firstOrFail();
            
            // Periksa kata sandi
            if (!Hash::check($request->password, $user->password)) {
               
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }
        
            // Buat token autentikasi
            $token = $user->createToken('user login')->plainTextToken;
        
            return response()->json([
                'message' => 'Login successful.',
                'data' => [
                    'user' => new UserResource($user),
                    'token' => $token,
                ],
            ]);
        } 
        catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.',
            ], 401); // 404 adalah status kode untuk "Not Found"
        }
        catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani kesalahan validasi (misalnya, kata sandi salah)
            return response()->json([
                'message' => $e->getMessage(),
            ], 401); // 404 adalah status kode umum untuk kesalahan validasi
        } 
        catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json([
                'success' => false,
                'message' => 'An error occurred.',
            ], 500);
        }
        
        
        
    }

    public function profile()
    {
        try {
            // Ambil data profil pengguna yang saat ini terautentikasi
            return response()->json([
                'message' => "Successful response",
                'data' => new UserResource(Auth::user())]);
        } catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred.'], 500);
        }
    }

    public function logout()
    {
        try {
            // Ambil pengguna yang saat ini terautentikasi dan hapus semua token
            $user = Auth::user();
            $user->tokens()->delete();

            return response()->json(['success' => true, 'message' => 'Logout successful.']);

        } 
        catch (\Exception $e) {
            // Tangani pengecualian umum
            return response()->json(['message' => 'An error occurred.'], 500);
        }
    }
}
