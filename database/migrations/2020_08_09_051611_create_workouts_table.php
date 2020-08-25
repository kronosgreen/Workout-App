<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('workout_type_id');
            $table->integer('count');
            $table->DateTime('date')->nullable();
            $table->string('unit')->nullable();
            $table->timestamps();

        });

        Schema::table('workouts', function(Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('workout_type_id')->references('id')->on('workout_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workouts');
    }
}
