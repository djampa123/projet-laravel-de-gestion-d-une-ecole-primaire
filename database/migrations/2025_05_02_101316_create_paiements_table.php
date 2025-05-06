<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id('id_paiement');
            $table->float('tranche1');
            $table->float('tranche2');
            $table->float('tranche3');
            $table->unsignedBigInteger('id_eleve');
            $table->timestamps();

            $table->foreign('id_eleve')
                  ->references('id_eleve')
                  ->on('eleves')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
