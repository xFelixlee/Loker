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
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cat');
            $table->string('nama_low',100);
            $table->string('perusahaan_low',100);
            $table->string('alamat_low',100);
            $table->string('desc_low',100);
            $table->string('kriteria_low',100);
            $table->date('deadline');
            $table->enum('sistem_kerja', ['FT', 'PT'])->default('FT');
            $table->string('posisi');
            $table->text('foto');
            $table->enum('status', ['O', 'P'])->default('O');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan');
    }
};
