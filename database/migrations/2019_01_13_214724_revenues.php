<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Revenues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("revenues", function(Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user')->nullable();

          $table->foreign('user')->references('id')->on('users')
          ->onDelete('set null')
          ->onUpdate('cascade');

          $table->unsignedInteger('solde')->default(0);
          $table->date('date');
          $table->engine = "InnoDB";
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
