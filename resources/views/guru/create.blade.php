@extends('layouts.app')

@section('title', 'Tambah Guru')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Tambah Guru Baru</h2>

        <form action="{{ route('guru.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="guru_nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Guru</label>
                <input type="text" name="guru_nama" id="guru_nama" value="{{ old('guru_nama') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500"
                       placeholder="Contoh: Pak Ahmad" required>
                @error('guru_nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('guru.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300">Batal</a>
                <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection