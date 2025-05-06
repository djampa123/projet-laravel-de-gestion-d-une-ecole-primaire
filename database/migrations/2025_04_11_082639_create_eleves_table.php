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
        Schema::create('eleves', function (Blueprint $table) {
            $table->id('id_eleve');
            $table->string('nom_eleve', 50);
            $table->string('prenom_eleve', 50);
            $table->string('date_naiss', 50);
            $table->string('lieu_naiss', 50);
            $table->string('nom_parent', 50);
            $table->string('telephone_parent', 50);
            $table->foreignId('id_salle')->constrained('salles')->onDelete('cascade'); // Corrected line
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
