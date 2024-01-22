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
        Schema::create('detalle_item', function (Blueprint $table) {
            $table->id();
            $table->integer('id_item');
            $table->string('tamaño');
            $table->double('multiplicador_tamaño');
            $table->timestamps();

            $table->foreign('id_item')->references('id')->on('item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_item');
    }
};
