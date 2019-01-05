<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendeur')->nullable();

            $table->foreign('vendeur')->references('id')->on('users')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->string('nom');
            $table->string('ville');
            $table->text('adresse');
            $table->string('tel');
            $table->Integer('qte');
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
