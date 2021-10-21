<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            $table->string('unite');
            $table->double('prix_unitaire');
            $table->integer('quantite');

            $table->unsignedBigInteger('categoriy_id');
            $table->foreign('categoriy_id')
                ->references('id')->on('categories')
                ->onDelete('cascade');

            $table->integer('casier_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
