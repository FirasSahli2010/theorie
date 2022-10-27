<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExaminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('exam', function (Blueprint $table) {
        $table->string('img')->mullable();
      });
      Schema::table('exampart', function (Blueprint $table) {
        $table->string('img')->mullable();
      });
      Schema::table('question', function (Blueprint $table) {
        $table->string('img')->mullable();
      });
      Schema::table('answer', function (Blueprint $table) {
        $table->string('img')->mullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('exam', function (Blueprint $table) {
        $table->dropColumn('img');
      });
      Schema::table('section', function (Blueprint $table) {
        $table->dropColumn('img');
      });
      Schema::table('question', function (Blueprint $table) {
        $table->dropColumn('img');
      });
      Schema::table('answer', function (Blueprint $table) {
        $table->dropColumn('img');
      });
    }
}
