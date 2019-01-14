<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('remember_token')->nullable();
            $table->string('ville', 30);
            $table->string('password');
            $table->enum('role', ['admin','vendeur','livreur']);
            $table->string('tel', 13);
            $table->string('banque', 20)->nullable();
            $table->string('rib', 20)->nullable();
            $table->string('num_cpt', 20)->nullable();
            $table->string('site')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->float('total')->default(0);
            $table->float('actuel')->default(0);
            $table->float('garantie')->default(0);
            $table->string('image')->nullable();
            $table->enum('bloquer', ['oui', 'non'])->default('non');
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
        Schema::dropIfExists('users');
    }
}
