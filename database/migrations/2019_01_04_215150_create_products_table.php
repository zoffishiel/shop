<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cid')->nullable();

            $table->foreign('cid')->references('id')->on('categories')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->string('titre');
            $table->text('description');
            $table->string('image');
            $table->string('video')->nullable();
            $table->Integer('prix_general');
            $table->Integer('prix_vente');
            $table->Integer('qte');
            $table->Integer('ventes')->default(0);
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
        Schema::dropIfExists('products');
    }
}
