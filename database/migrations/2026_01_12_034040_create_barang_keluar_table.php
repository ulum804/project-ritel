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
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id('id_barang_keluar');
            $table->dateTime('tanggal_keluar_in');
            $table->dateTime('tanggal_keluar_approve')->nullable();
            $table->enum('status_keluar', ['pending', 'setuju', 'tolak'])->default('pending');
            $table->foreignId('id_barang')->constrained('barang','id_barang');
            $table->foreignId('id_gudang')->constrained('gudang','id_gudang');
            $table->foreignId('id_user')->constrained('userr','id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
