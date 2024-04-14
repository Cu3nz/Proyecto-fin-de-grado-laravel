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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table -> string('nombre') -> unique();
            $table -> text('descripcion');
            $table -> enum('estado' , ['DISPONIBLE' , 'NO DISPONIBLE']);
            $table->decimal('precio', 8, 2);
            /* $table -> string('imagen'); */ //! Eliminamos la imagen porque vamos a hacer otra tabla para almacenar las imagenes para un producto
            $table -> string('codigo_articulo') -> unique();
            $table -> integer('stock'); //! Este stock puede existir o no, basicamente los pedidos se hacen segun llegan, pero si hay productos que se han hecho y al final pues no se han enviado porque se han cancelado se pone el numero de stock
            $table -> foreignId('category_id') -> constrained() -> onDelete('cascade'); //! como siempre
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); //todo cAMBIADO PARA BORRAR EL USUARIO, PARA QUE AL BORRARLO NO SE BORREN LOS PRODUCTOS
            /* $table -> foreignId('user_id') -> constrained() -> onDelete('cascade'); //! como siempre */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
