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
            $table->foreignId('post_id')->constrained()->cascadeOnDelete(); //same as the 3 lines below
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); //same as the 3 lines below
//            $table->unsignedBigInteger('post_id');
//            $table->foreign('post_id')->references('id')->on('posts')
//                ->onDelete('cascade');

            $table->timestamps();
            $table->text('body');

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
