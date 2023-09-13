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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('nom',150);
            $table->timestamps();
            $table->string('description_courte',255);
            $table->text('description_longue',1000);
            $table->date('date');
            $table->string('heure_debut',5);
            $table->string('heure_fin',5);
            $table->integer('max_personnes');
            $table->integer('nombre_inscrits');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
