<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $beritas = Task::latest()->get();
        return view('tasks', compact('beritas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'description' => 'required',
        ]);

        Task::create([
            'title' => $request->title,
            'location' => $request->location,
            'description' => $request->description,
            'image_url' => $request->image_url ?? 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=500',
        ]);

        return redirect()->back()->with('success', 'Berita wisata Lombok berhasil diterbitkan!');
    }

    public function destroy($id)
    {
        $berita = Task::findOrFail($id);
        $berita->delete();

        return redirect()->back()->with('success', 'Berita wisata berhasil dihapus!');
    }
}
