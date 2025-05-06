<?php
// database/migrations/xxxx_xx_xx_create_classes_table.php
// Migration pour la table classes
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id('id_classe');  // Clé primaire auto-incrémentée
            $table->string('nom_classe', 50);
            $table->foreignId('id_section')->constrained('sections');  // La clé étrangère vers la table 'sections'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classes');
    }
}
