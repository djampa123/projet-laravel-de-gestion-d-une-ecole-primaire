<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('salles', function (Blueprint $table) {
        $table->id('id_salle'); // Crée un champ 'id' comme clé primaire
        $table->string('nom_salle', 50);
        $table->string('emplacement', 50);
        $table->integer('capacite');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salles');
    }
};
