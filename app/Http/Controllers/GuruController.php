<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $guru = Guru::when($search, function ($query) use ($search) {
            return $query->where('guru_nama', 'like', "%{$search}%");
        })->paginate(10);

        return view('guru.index', compact('guru'));
    }
    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_nama' => 'required|string|max:255',
        ]);

        Guru::create($request->only('guru_nama'));

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'guru_nama' => 'required|string|max:255',
        ]);

        $guru->update($request->only('guru_nama'));

        return redirect()->route('guru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus.');
    }
}