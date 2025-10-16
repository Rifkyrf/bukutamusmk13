@extends('layouts.app')

@section('title', 'Kelola Admin - Tamuin')
@section('page-title', 'Kelola Admin')

@section('content')
<div class="space-y-6">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
            <button type="button" class="absolute top-0 right-0 mt-2 mr-2 text-green-700 hover:text-green-900" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
            <button type="button" class="absolute top-0 right-0 mt-2 mr-2 text-red-700 hover:text-red-900" onclick="this.parentElement.remove()">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex items-center justify-between mb-6">
            <form method="GET" action="{{ route('admin.index') }}" class="flex items-center gap-3 w-full">
                {{-- Search Input --}}
                <div class="relative flex-1">
                    <input
                        name="search"
                        value="{{ request('search') }}"
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        placeholder="Cari admin (nama, username, email)..."
                    />
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                </div>

                {{-- Tombol Tambah --}}
                <a href="{{ route('admin.create') }}" class="inline-flex items-center px-3 py-1 bg-purple-600 hover:bg-purple-700 text-white rounded-lg">
                    <i class="fas fa-plus mr-2"></i> Tambah Admin
                </a>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 border-b">
                        <th class="py-3 px-4">No</th>
                        <th class="py-3 px-4">Nama</th>
                        <th class="py-3 px-4">Username</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4 w-24">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4 text-gray-700">{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</td>
                            <td class="py-3 px-4 font-medium text-gray-900">{{ $user->name }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $user->username }}</td>
                            <td class="py-3 px-4 text-gray-700">{{ $user->email }}</td>
                            <td class="py-3 px-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.edit', $user) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if($user->id !== auth()->id())
                                        <form method="POST" action="{{ route('admin.destroy', $user) }}" onsubmit="return confirm('Yakin hapus admin ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @else
                                        <span class="p-2 text-gray-400 cursor-not-allowed" title="Tidak bisa hapus diri sendiri">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="py-6 text-center text-gray-500">Tidak ada data admin ditemukan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
            <div class="flex items-center justify-between mt-4">
                <p class="text-sm text-gray-600">Menampilkan {{ $users->firstItem() }} sampai {{ $users->lastItem() }} dari {{ $users->total() }} data</p>
                <div>{{ $users->links() }}</div>
            </div>
        @endif
    </div>
</div>
@endsection