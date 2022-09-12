<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFactureEmprunteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_emprunteurs', function (Blueprint $table) {
            $table->id();
            $table->string('N_Facture');
            $table->foreignId('contratEmprunteur_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('gestionnaire_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('Designation');
            $table->date('Date_emission');
            $table->string('Reglement');
            $table->string('statut');
            $table->float('Montant');
            $table->float('taux_tva');
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
        Schema::dropIfExists('facture_emprunteurs');
    }
}
