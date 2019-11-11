<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); //name of the user who wrote the comment
            $table->string('email'); //email of the user
            $table->unsignedBigInteger('post_id'); //foreign key
            $table->text('comment_content');
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts')->
            onDelete('cascade')->onUpdate('cascade');

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
