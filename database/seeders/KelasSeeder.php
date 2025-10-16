<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    public function run()
    {
        // Daftar kelas sesuai permintaanmu
        $kelasList = [
            'X RPL 1', 'X RPL 2',
            'XI RPL 1', 'XI RPL 2',
            'XII RPL 1', 'XII RPL 2',

            'X TKJ 1', 'X TKJ 2', 'X TKJ 3',
            'XI TKJ 1', 'XI TKJ 2', 'XI TKJ 3',
            'XII TKJ 1', 'XII TKJ 2', 'XII TKJ 3',

            'X KA 1', 'X KA 2', 'X KA 3', 'X KA 4', 'X KA 5', 'X KA 6',
            'XI KA 1', 'XI KA 2', 'XI KA 3', 'XI KA 4', 'XI KA 5', 'XI KA 6',
            'XII KA 1', 'XII KA 2', 'XII KA 3', 'XII KA 4', 'XII KA 5', 'XII KA 6',
            'XIII KA 1', 'XIII KA 2', 'XIII KA 3', 'XIII KA 4', 'XIII KA 5', 'XIII KA 6',
        ];

        foreach ($kelasList as $namaKelas) {
            // Ambil tingkat dari awal string (X, XI, XII, XIII)
            $tingkat = '';
            if (str_starts_with($namaKelas, 'XIII')) {
                $tingkat = 'XIII';
            } elseif (str_starts_with($namaKelas, 'XII')) {
                $tingkat = 'XII';
            } elseif (str_starts_with($namaKelas, 'XI')) {
                $tingkat = 'XI';
            } elseif (str_starts_with($namaKelas, 'X ')) {
                $tingkat = 'X';
            }

            Kelas::create([
                'nama' => $namaKelas,
                'tingkat' => $tingkat,
            ]);
        }
    }
}