<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paiements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('utilisateur')->nullable();

          $table->foreign('utilisateur')->references('id')->on('users')
          ->onDelete('set null')
          ->onUpdate('cascade');

          $table->unsignedInteger('montant');
          $table->date('date');
          $table->enum('accepter', ['en attent', 'oui', 'non'])->default('en attent');

          $table->engine = 'InnoDB';
        }
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
