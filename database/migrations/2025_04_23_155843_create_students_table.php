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
        Schema::create('students', function (Blueprint $table) {
            $table->id('id_eleve'); // id auto-incrémenté
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('image');
            $table->string('section');
            $table->string('nom_parent');
            $table->integer('tel_parent');
            $table->unsignedBigInteger('id_salle');
            $table->unsignedBigInteger('id_classe');
            $table->timestamps();
        
            $table->foreign('id_salle')->references('id_salle')->on('salles')->onDelete('cascade');
            $table->foreign('id_classe')->references('id_classe')->on('classes')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
