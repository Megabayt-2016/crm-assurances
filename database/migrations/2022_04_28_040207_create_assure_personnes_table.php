<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssurePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assure_personnes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assurancePersonne_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('type');
            $table->string('civilite');
            $table->string('nom');
            $table->string('prenom');
            $table->date('dateNaissance');
            $table->string('regime');
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
        Schema::dropIfExists('assuré_personnes');
    }
}
