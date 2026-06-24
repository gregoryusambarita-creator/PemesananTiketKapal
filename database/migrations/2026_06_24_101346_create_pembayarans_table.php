<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pemesanan_id')
                  ->constrained('pemesanans')
                  ->onDelete('cascade');

            $table->date('tanggal_bayar');

            $table->decimal('jumlah_bayar',12,2);

            $table->enum('metode_pembayaran',[
                'Transfer Bank',
                'E-Wallet',
                'Tunai'
            ]);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};