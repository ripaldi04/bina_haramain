<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
  public function index()
{
    $video = Video::latest()->first(); // Atau sesuai kebutuhan

    return view('pages.admin.admin_landing_page', compact('video'));
}

    public function create()
    {
        return view('videos.create'); // Buat file Blade ini nanti
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_id' => 'required|string|max:50',
            'description' => 'nullable|string',
        ]);

        Video::create($request->only(['title', 'youtube_id', 'description']));

        return redirect()->route('admin.landing.index')->with('success', 'Video berhasil ditambahkan.');
    }

    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'youtube_id' => 'required',
        ]);

        $video->update($request->all());
        return redirect()->route('videos.index')->with('success', 'Video berhasil diperbarui');
    }
}
