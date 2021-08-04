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
            $table->id();
            // $table->unsignedBigInteger('post_id'); // never going to be negative
            // $table->unsignedBigInteger('user_id');

            $table->foreignId('post_id')->constrained()->cascadeOnDelete(); // this is the shorthand for creating foreign key contraints instead of the long form below
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // this is the shorthand for creating foreign key contraints instead of the long form below

            $table->text('body');
            $table->timestamps();

            // $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete();
            // $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
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
