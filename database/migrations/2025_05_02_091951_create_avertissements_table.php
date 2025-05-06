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
        Schema::create('avertissements', function (Blueprint $table) {
            $table->id('id_avertissement');
            $table->text('description');
            $table->string('date_avertissement', 50);
            $table->unsignedBigInteger('id_eleve');
            $table->foreign('id_eleve')->references('id_eleve')->on('eleves')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avertissements');
    }
};
