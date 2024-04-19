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
        Schema::create('product_user_likes', function (Blueprint $table) {
            //TODO TABLA PIVOTE O TABLA DE UNION ENTRE LAS RELACIONES DE PRODUCTOS Y USER QUE ES UNA RELACION N:M
            $table->id();
            $table-> foreignId('product_id') -> constrained() -> onDelete('cascade'); // Si se elimina un producto se eliminan todos los likes asociados a ese producto
            $table-> foreignId('user_id') -> constrained() -> onDelete('cascade'); // Si se elimina un usuario se eliminan todos los likes asociados a ese usuario.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_user_likes');
    }
};
