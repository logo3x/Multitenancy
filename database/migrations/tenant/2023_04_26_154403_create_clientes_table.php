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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')
            ->nullable()
            ->constrained('users')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->string('dominio');
            $table->string('empresa');
            $table->string('contacto');
            $table->string('telefono');
            $table->string('telefono2')->nullable();
            $table->string('direccion')->nullable();
            $table->string('email');
            $table->string('nit')->nullable();
            $table->string('actividad')->nullable();
            $table->string('plan');
            $table->date('creacion');
            $table->date('vencimiento');
            $table->string('metodo_pago')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
