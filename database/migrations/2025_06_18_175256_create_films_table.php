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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('tytul');
            $table->string('opis')->nullable();
            $table->integer("czas_trwania");
            $table->string('poster')->nullable();
            $table->boolean('is_hot')->default(false);
            $table->boolean('is_active')->default(true);
            $table->foreignId('kategoria_id')->constrained('kategorias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
