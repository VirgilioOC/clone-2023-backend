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
        Schema::create('compone', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo_pedido');
            $table->integer('id_detalle');

            $table->foreign('codigo_pedido')->references('id')->on('pedido');
            $table->foreign('id_detalle')->references('id')->on('detalle_item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compone');
    }
};
