<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rutes', function (Blueprint $table) {

            $table->id();

            $table->string('asal');
            $table->string('tujuan');

            $table->integer('jarak');
            $table->decimal('harga',12,2);

            $table->enum('status',[
                'Aktif',
                'Tidak Aktif'
            ])->default('Aktif');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rutes');
    }
};