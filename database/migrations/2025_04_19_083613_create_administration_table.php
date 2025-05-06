<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('administrations', function (Blueprint $table) {
            $table->id('id_administration');
            $table->string('nom_personnel');
            $table->string('profession');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('administrations');
    }
};
