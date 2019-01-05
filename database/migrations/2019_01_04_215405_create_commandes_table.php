<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->string('serie', 10)->unique();
            $table->enum('status', ['en cours', 'evoyer', 'deliverer']);
            $table->unsignedInteger('produit')->nullable();

            $table->foreign('produit')->references('id')->on('products')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->unsignedInteger('vendeur')->nullable();

            $table->foreign('vendeur')->references('id')->on('users')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->date('date')->nullable();
            $table->Integer('qte');
            $table->unsignedInteger('service')->nullable();

            $table->foreign('service')->references('id')->on('service_livraison')
            ->onDelete('set null')
            ->onUpdate('cascade');

            $table->text('adresse');
            $table->string('ville');
            $table->string('tel');
            $table->string('nom_client');
            $table->text('commentaire');
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
        Schema::dropIfExists('orders');
    }
}
