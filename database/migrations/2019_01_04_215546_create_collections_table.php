<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vendeur')->nullable();

            $table->foreign('vendeur')->references('id')->on('users')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->unsignedInteger('produit')->nullable();

            $table->foreign('produit')->references('id')->on('products')
            ->onDelete('set null')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('collections');
    }
}
