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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table -> string('titulo');
            $table -> text('reseña');
            $table -> foreignId('user_id') -> constrained() -> onDelete('cascade'); // Si se elimina un usuario se eliminan todas las reviews asociadas a ese usuario.
            $table -> foreignId('product_id') -> constrained() -> onDelete('cascade'); // Si se elimina un producto se eliminan todas las reviews asociadas a ese producto.
            $table -> integer('puntuacion');
            $table -> text('pros') -> nullable();  //! Se puede escribir o no, no es requerido para el formulario
            $table -> text('contras') -> nullable(); //! Se puede escribir o no, no es requerido para el formulario
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
