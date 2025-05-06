<?php

// database/migrations/xxxx_xx_xx_create_matieres_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatieresTable extends Migration
{
    public function up()
    {
        Schema::create('matieres', function (Blueprint $table) {
            $table->id('id_matiere');
            $table->string('nom_matiere', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matieres');
    }
}
