<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assurancePersonne_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->timestamps();
            $table->string('situation')->nullable();
            $table->string('permis_conduire_name')->nullable();
            $table->string('permis_conduire_path')->nullable();
            $table->string('carte_grise_name')->nullable();
            $table->string('carte_grise_path')->nullable();
            $table->string('RIB_name')->nullable();
            $table->string('RIB_path')->nullable();
            $table->string('relever_information_name')->nullable();
            $table->string('relever_information_path')->nullable();
            $table->string('copie_jugement_name')->nullable();
            $table->string('copie_jugement_path')->nullable();
            $table->string('document_3F_name')->nullable();
            $table->string('document_3F_path')->nullable();
            $table->string('carte_vitale_name')->nullable();
            $table->string('carte_vitale_path')->nullable();
            $table->string('CIN_name')->nullable();
            $table->string('CIN_path')->nullable();
            $table->string('attestation_droit_name')->nullable();
            $table->string('attestation_droit_path')->nullable();
            $table->string('carte_mutuelle_name')->nullable();
            $table->string('carte_mutuelle_path')->nullable();
            $table->string('CP_CPA_name')->nullable();
            $table->string('CP_CPA_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
