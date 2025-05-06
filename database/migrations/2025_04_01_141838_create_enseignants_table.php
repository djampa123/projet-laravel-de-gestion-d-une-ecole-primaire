
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string('nom_enseignant', 50);
            $table->foreignId('classe_id')->constrained()->onDelete('cascade'); // Ajoute une clé étrangère vers la table 'classes'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enseignants');
    }
};
