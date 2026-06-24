<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('jadwal_id')
                  ->constrained('jadwals')
                  ->onDelete('cascade');

            $table->string('nama_penumpang');

            $table->string('nik');

            $table->string('telepon');

            $table->integer('jumlah_tiket');

            $table->decimal('total_harga', 12, 2);

            $table->enum('status', [
                'Menunggu',
                'Lunas',
                'Batal'
            ])->default('Menunggu');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};