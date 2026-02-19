<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::table('courses', function (Blueprint $table) {
        // Añadimos el estado. Por defecto será 'draft' para mayor seguridad.
        $table->enum('status', ['active', 'draft', 'archived'])->default('draft');
    });
}

public function down(): void {
    Schema::table('courses', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}
};
