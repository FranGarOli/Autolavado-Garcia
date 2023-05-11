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
        Schema::table('registers', function (Blueprint $table) {
            $table->enum('status', ['Pendiente', 'Recibido', 'En proceso', 'Terminado', 'Pagado'])
            ->default('Recibido')
            ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registers', function (Blueprint $table) {
            $table->enum('status', ['Recibido', 'En proceso', 'Terminado', 'Pagado'])
            ->default('Recibido')
            ->change();
        });
    }
};
