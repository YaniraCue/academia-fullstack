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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nombre del estudiante
        $table->string('email'); // Email del estudiante
        
        // Relación 1:N: Un estudiante pertenece a un curso
        $table->foreignId('course_id')
              ->constrained()
              ->onDelete('cascade'); // Si borras un curso, se borran sus alumnos
              
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
