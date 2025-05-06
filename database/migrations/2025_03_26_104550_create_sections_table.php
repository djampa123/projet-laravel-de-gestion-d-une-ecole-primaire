<?php
// Exemple de migration pour la table sections
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id('id');  // Assurez-vous que l'id est défini comme une clé primaire
            $table->string('nom_section');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sections');
    }
}
