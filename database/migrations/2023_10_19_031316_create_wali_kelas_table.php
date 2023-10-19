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
        Schema::create('wali_kelas', function (Blueprint $table) {
            $table->integer('id_guru', false)->nullable(false);
            $table->foreign('id_guru')
                ->references('id_guru')->on('guru')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_walas', true, false)->nullable(false);
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wali_kelas');
    }
};
