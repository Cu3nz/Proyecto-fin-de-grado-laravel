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
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //? Si se elimina un usuario, se eliminan sus carritos
			$table -> string('email_usuario');
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); //? Si se elimina un producto, se eliminan sus carritos
            $table->string('nombre_producto');
            $table->string('codigo_articulo');
            $table->decimal('precio_unitario', 8, 2);
            $table->integer('cantidad');
            $table->string('imagen_producto');
            $table->decimal('total', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_carts');
    }
};
