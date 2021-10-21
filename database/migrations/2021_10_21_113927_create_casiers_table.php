<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casiers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nombre');
            $table->timestamps();
        });

        DB::table('casiers')->insert(
            array(
                ['name' => '12', 'nombre'=> '12'],
                ['name' => '24', 'nombre'=> '24'],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casiers');
    }
}
