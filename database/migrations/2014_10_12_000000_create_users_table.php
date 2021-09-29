<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique();;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('usertype')->nullable()->comment('Employee, Admin');
            $table->string('password')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('join_date')->nullable();
            $table->double('salary')->nullable();
            $table->string('person_to_contact')->nullable();
            $table->string('awareness1')->nullable();
            $table->string('awareness2')->nullable();
            $table->string('awareness3')->nullable();
            $table->rememberToken();
            $table->tinyInteger('status')->default(1)->commment('0=inactive, 1=active');
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('users');
    }
}
