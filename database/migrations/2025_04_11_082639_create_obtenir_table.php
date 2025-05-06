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
        Schema::create('obtenir', function (Blueprint $table) {
            $table->unsignedBigInteger('id_matiere');
            $table->unsignedBigInteger('id_trimestre');
            $table->unsignedBigInteger('id_eleve');
            $table->unsignedBigInteger('id_classe');
            $table->float('note');
            $table->string('date', 50);
        
            $table->primary(['id_matiere', 'id_trimestre', 'id_eleve', 'id_classe']);
        
            $table->foreign('id_matiere')->references('id_matiere')->on('matieres');
            $table->foreign('id_trimestre')->references('id_trimestre')->on('trimestres');
            $table->foreign('id_eleve')->references('id_eleve')->on('eleves');
            $table->foreign('id_classe')->references('id_classe')->on('classes');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obtenir');
    }
};
