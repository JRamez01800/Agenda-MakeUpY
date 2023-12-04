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
        Schema::create('productos', function (Blueprint $table) {
            $table->string('IdProducto', 7);
            $table->string('Nombre', 90);
            $table->string('Marca', 30);
            $table->float('Precio');
            $table->string('Descripcion', 200);
            $table->string('Imagen', 200);
            $table->primary('IdProducto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
