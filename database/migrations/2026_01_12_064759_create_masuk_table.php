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
        Schema::create('masuk', function (Blueprint $table) {
            $table->id('id_masuk');
            $table->string('qty_masuk');
            $table->enum('status_masuk', ['pending', 'setuju', 'tolak']);
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
        Schema::dropIfExists('masuk');
    }
};
