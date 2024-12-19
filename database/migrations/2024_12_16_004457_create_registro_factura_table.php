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
        Schema::create('registro_factura', function (Blueprint $table) {
            $table->id();
            $table->string('num_factura')->nullable();
            $table->string('foto_factura');
            $table->string('foto_portada');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('user_id');
            $table->foreign('estado_id')->references('id')->on('estados')->default(2);;
            $table->foreignId('estado_id');
            $table->string('observaciones')->nullable();
            $table->foreign('estado_portada')->references('id')->on('estados')->default(2);
            $table->foreignId('estado_portada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_factura');
    }
};
