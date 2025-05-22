<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class KontakController extends Controller
{
    public function kirim(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::raw(
            "Nama: {$data['name']}\nEmail: {$data['email']}\nNo HP: +62{$data['phone']}\n\nPesan:\n{$data['message']}",
            function ($message) use ($data) {
                $message->to('muhamadripaldi75@gmail.com') // Ganti dengan email tujuan
                    ->subject($data['subject']);
            }
        );

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
