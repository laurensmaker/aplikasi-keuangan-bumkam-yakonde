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
        Schema::create('produksi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_produksi');
            $table->foreignId('kandang_id')->constrained('kandang')->onDelete('cascade');
            $table->integer('jumlah_ayam');
            $table->integer('jumlah_telur');
            $table->decimal('berat_total', 8, 2)->nullable();
            $table->integer('telur_bagus')->default(0);
            $table->integer('telur_rusak')->default(0);
            // $table->integer('telur_kecil')->default(0);
            $table->decimal('pakan_digunakan', 8, 2)->nullable()->comment('Jumlah pakan yang digunakan dalam kg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi');
    }
};
