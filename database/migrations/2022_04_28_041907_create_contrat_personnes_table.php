<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratPersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrat_personnes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('assurancePersonne_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('gestionnaire_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('agent_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('N_Version');
            $table->string('N_Contrat');
            $table->string('compagnie');
            $table->string('produit');
            $table->string('formule');
            $table->string('niveau_Garantie');
            $table->date('dateCreation');
            $table->date('debutSignature');
            $table->date('debutEffet');
            $table->date('dateEcheance');
            $table->string('Demande_Resiliation');
            $table->date('finContrat');
            $table->float('Prime_Brute_Mensuelle');
            $table->float('Prime_Nette_Mensuelle');
            $table->float('Prime_Brute_Anuelle');
            $table->float('Prime_Ntte_Anuelle');
            $table->float('Frais_Honoraires');
            $table->string('Nbr_Mois_Gratuits_Annee1');
            $table->string('Nbr_Mois_Gratuits_Annee2');
            $table->string('Nbr_Mois_Gratuits_Annee3');
            $table->string('Fractionnement');
            $table->string('Type_Commi');
            $table->float('Commi_Annee1');
            $table->float('Commi_Annee_Suivantes');
            $table->string('commentaire');
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
        Schema::dropIfExists('contrat_personnes');
    }
}
