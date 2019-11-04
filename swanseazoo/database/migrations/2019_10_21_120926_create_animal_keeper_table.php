<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalKeeperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_keeper', function (Blueprint $table) {
           // $table->bigIncrements('id');
           $table->primary(['animal_id','keeper_id']);
           $table->unsignedInteger('animal_id');
           $table->unsignedInteger('keeper_id');
           $table->timestamps();

           $table->foreign('animal_id')->references('id')->on('animals')->
              onDelete('cascade')->onUpdate('cascade');
             
            $table->foreign('keeper_id')->references('id')->
              on('keepers')->onDelete('cascade')->onUpdate('cascade');
             


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_keeper');
    }
}
