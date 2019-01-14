<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommandeProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("commande_produits", function(Blueprint $table) {
          $table->increments('id');
          $table->string('commande', 10)->nullable();

          $table->foreign('commande')->references('serie')->on('commandes')
          ->onDelete('set null')
          ->onUpdate('cascade');

          $table->unsignedInteger('produit')->nullable();

          $table->foreign('produit')->references('id')->on('products')
          ->onDelete('set null')
          ->onUpdate('cascade');

          $table->Integer('prix');
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
        //
    }
}
