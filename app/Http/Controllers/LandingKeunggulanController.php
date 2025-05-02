<?php

namespace App\Http\Controllers;

use App\Models\Keunggulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingKeunggulanController extends Controller
{

    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image_url' => 'nullable|image|max:2048',
        ]);

        $data = [
            'title' => $validated['title'],
        ];

        if ($request->id) {
            // EDIT
            $keunggulan = Keunggulan::findOrFail($request->id);

            if ($request->hasFile('image_url')) {
                if ($keunggulan->image_url && $keunggulan->image_url !== 'image_keunggulan/default.jpg' && Storage::disk('public')->exists($keunggulan->image_url)) {
                    Storage::disk('public')->delete($keunggulan->image_url);
                }

                $imagePath = $request->file('image_url')->store('image_keunggulan', 'public');
                $data['image_url'] = $imagePath;
            }

            $keunggulan->update($data);
            return redirect()->route('admin.landing.index')->with('success', 'Keunggulan berhasil disimpan');
        } else {
            // CREATE
            if ($request->hasFile('image_url')) {
                $imagePath = $request->file('image_url')->store('image_keunggulan', 'public');
                $data['image_url'] = $imagePath;
            } else {
                $data['image_url'] = 'image_keunggulan/default.jpg';
            }

            Keunggulan::create($data);
            return redirect()->route('admin.landing.index')->with('success', 'Keunggulan berhasil ditambahkan');
        }
    }

    public function destroy($id)
    {
        $item = Keunggulan::findOrFail($id);

        if ($item->image_url && $item->image_url !== 'image_keunggulan/default.jpg' && Storage::disk('public')->exists($item->image_url)) {
            Storage::disk('public')->delete($item->image_url);
        }

        $item->delete();

        return redirect()->route('admin.landing.index')->with('success', 'Keunggulan berhasil dihapus');
    }
}