<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_pelanggan');
            $table->string('alamat_pelanggan');
            $table->string('no_hp_pelanggan');
            $table->decimal('jumlah', 10, 2); // jumlah telur (kg)
            $table->decimal('harga_per_satuan', 10, 2); // jumlah telur (kg)
            $table->string('jenis_satuan', 10, 2);
            $table->decimal('total_harga', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
