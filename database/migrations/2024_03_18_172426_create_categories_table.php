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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table -> string('nombre') -> unique();
            //! tengo que definir la tabla en el constrained
            $table->foreignId('category_padre_id')->nullable()->constrained('categories')->onDelete('cascade');
            //Añadida la columna 'es_padre' que sera un booleano.
            //? Por defecto, establecer en false para las subcategorias.
            $table->boolean('es_padre')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
