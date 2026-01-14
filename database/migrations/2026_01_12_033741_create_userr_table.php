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
        Schema::create('userr', function (Blueprint $table) {
            $table->id("id_user");
            $table->string("nama_user");
            $table->string("password"); 
            $table->string("email")->unique(); 
            $table->integer("telepon"); 
            $table->foreignId('id_role')->constrained('role','id_role');
            $table->foreignId('id_gudang')->constrained('gudang','id_gudang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userr');
    }
};
