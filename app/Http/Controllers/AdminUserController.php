<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    //
    public function index()
    {
        $users = User::latest()->get();
        return view('pages.admin.admin_user', compact('users'));
    }
    public function update(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'id' => 'required|exists:users,id', // Pastikan ID user ada di database
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id, // Pastikan email unik kecuali untuk user yang sedang diedit
        ]);

        // Temukan user berdasarkan ID
        $user = User::find($request->id);

        if ($user) {
            // Perbarui data user
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save(); // Simpan perubahan

            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'failed']);
    }

    public function destroy($id)
    {

        Log::info("Coba hapus user ID: " . $id);

        try {
            $user = User::findOrFail($id);
            $user->delete();

            Log::info("Berhasil hapus user ID: " . $id);
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error("Gagal hapus user: " . $e->getMessage());
            return response()->json(['status' => 'failed', 'message' => $e->getMessage()], 500);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'kode_referral' => Str::random(8),
            'password' => bcrypt($request->password),
            'email_verified_at' => now(), // Set auto verifikasi
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }

}
