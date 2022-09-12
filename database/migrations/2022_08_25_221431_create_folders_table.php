<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->id();
            $table->string('carteIdentiteRecto')->nullable();
            $table->string('carteIdentiteVerso')->nullable();
            $table->string('carteGriseRecto')->nullable();
            $table->string('carteGriseVerso')->nullable();
            $table->string('permisRecto')->nullable();
            $table->string('permisVerso')->nullable();
            $table->string('releveInformation')->nullable();
            $table->string('rib')->nullable();
            $table->string('copieJugement')->nullable();
            $table->string('visiteMedicale')->nullable();
            $table->string('pv')->nullable();
			$table->string('certificatCession')->nullable();
            $table->string('carteVitale')->nullable();
            $table->string('carteMutuelRecto')->nullable();
            $table->string('carteMutuelVerso')->nullable();
            $table->string('attestationSecuriteSociale')->nullable();
            $table->string('carteProfesionnelleRecto')->nullable();
            $table->string('carteProfesionnelleVerso')->nullable();
            $table->string('kBis')->nullable();
            $table->foreignId('status_id')->default(1)->constrained('status');
            $table->foreignId('guest_id')->constrained('guests')->onDelete('cascade');
            $table->foreignId('situation_id')->constrained('situations');
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
        Schema::dropIfExists('folders');
    }
}
