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
        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->renameColumn('Qty_masuk', 'qty_keluar');
            $table->decimal('harga_satuan', 10, 2)->nullable()->after('qty_keluar');
            $table->foreignId('id_gudang_tujuan')->constrained('gudang', 'id_gudang')->after('id_gudang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barang_keluar', function (Blueprint $table) {
            $table->dropForeign(['id_gudang_tujuan']);
            $table->dropColumn(['harga_satuan', 'id_gudang_tujuan']);
            $table->renameColumn('qty_keluar', 'Qty_masuk');
        });
    }
};
