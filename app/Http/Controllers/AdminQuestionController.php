<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class AdminQuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('admin_landing_page', compact('questions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Question::create($request->only('title', 'deskripsi'));

        return back()->with('success', 'Pertanyaan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $question = Question::findOrFail($id);
        $question->update($request->only('title', 'deskripsi'));

        return back()->with('success', 'Pertanyaan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return back()->with('success', 'Pertanyaan berhasil dihapus!');
    }
}