<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::latest()->get();
        return view('pages.admin.admin_user', compact('users'));   
    } 
    public function updateUser(Request $request)
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
    // Cari user berdasarkan ID
    $user = User::find($id);
    
    if ($user) {
         // Cek sebelum menghapus
         Log::info("User sebelum dihapus: " . $user->id);
        
         // Hapus user jika ditemukan
         $user->delete();
         
         // Cek setelah dihapus
         Log::info("User setelah dihapus: " . $user->id);
 

        return response()->json(['status' => 'success']);
    }

    return response()->json(['status' => 'failed']);
    }

}
