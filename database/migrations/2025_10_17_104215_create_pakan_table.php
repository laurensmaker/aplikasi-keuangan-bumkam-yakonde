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
        Schema::create('pakan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pakan', 50);
            $table->decimal('stok_awal', 10, 2)->default(0);
            $table->decimal('stok_masuk', 10, 2)->default(0);
            $table->decimal('stok_sisa', 10, 2)->default(0);
            $table->decimal('harga_per_kg', 10, 2);
            $table->decimal('total_harga', 15, 2)->nullable(); 
            $table->date('tanggal_masuk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakan');
    }
};
