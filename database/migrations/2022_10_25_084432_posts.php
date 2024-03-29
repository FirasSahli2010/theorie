<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('posts', function (Blueprint $table) {
          $table->id();
          $table->integer('category')->unsigned();

          $table->string('title');
          $table->string('slug')->unique();
          $table->mediumText('desc')->nullable();
          $table->integer('language')->unsigned();
          $table->enum('shw', ['Y', 'N'])->default('N');
          $table->string('image')->nullable();
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
        //
    }
}
