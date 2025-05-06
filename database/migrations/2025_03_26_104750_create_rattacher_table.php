<?php
// database/migrations/xxxx_xx_xx_create_rattacher_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRattacherTable extends Migration
{
    public function up()
    {
        Schema::create('rattacher', function (Blueprint $table) {
            $table->unsignedBigInteger('id_classe');
            $table->unsignedBigInteger('id_matiere');
            $table->primary(['id_classe', 'id_matiere']);
            $table->foreign('id_classe')->references('id_classe')->on('classes')->onDelete('cascade');
            $table->foreign('id_matiere')->references('id_matiere')->on('matieres')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rattacher');
    }
}
