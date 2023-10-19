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
        Schema::create('gurus', function (Blueprint $table) {
            $table->integer('id_guru', true, false)->nullable(false);
            $table->integer('id_user', false)->nullable(false);
            $table->string('nama_guru', 60)->nullable(false);
            $table->text('foto_guru')->nullable(false);
            $table->timestamps();

            $table->foreign('id_user')
            ->references('id_user')->on('tbl_user')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
