<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('instansi', function (Blueprint $table) {
//             $table->id();
//             $table->string('nama_instansi');
//             $table->string('alamat')->nullable();
//             $table->string('no_telepon')->nullable();
//             $table->string('email')->nullable();
//             $table->string('jenis_instansi')->nullable(); // misal: Sekolah, Perusahaan, Instansi Pemerintah, dll
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('instansi');
//     }
// };
