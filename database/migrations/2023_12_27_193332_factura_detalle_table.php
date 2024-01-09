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
        Schema::create('factura_detalle', function (Blueprint $table) {
            $table->id('id_factura_detalle');
            $table->biginteger('id_factura');
            $table->biginteger('id_producto');
            $table->decimal('costo_unitario',10,2)->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('total',10,2)->nullable();

            // $table->foreign('id_factura')->references('id_factura')->on('factura');
            // $table->foreign('id_producto')->references('id_producto')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura_detalle');
    }
};
