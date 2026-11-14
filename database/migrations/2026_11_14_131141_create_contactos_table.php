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
        Schema::create('contacts', function (Blueprint $table) {
            $table->integer('id_contacto', true); // Auto increment int
            $table->string('nombres', 80);
            $table->string('apellidos', 80);
            $table->integer('id_empresa');
            $table->integer('id_operador');
            $table->integer('id_grupo');
            $table->char('telefono_movil', 11);
            $table->char('telefono_casa', 11)->nullable();
            $table->string('correo', 90)->nullable();
            $table->string('descripcion_grupo', 80)->nullable();
            $table->date('fecha_cumpleanios')->nullable();
            $table->string('observaciones', 100)->nullable();
            $table->timestamp('fecha_registro')->useCurrent();

            // Llaves foráneas con restricciones exactas
            $table->foreign('id_empresa')
                ->references('id_empresa')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_operador')
                ->references('id_operador')
                ->on('operators')
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreign('id_grupo')
                ->references('id_grupo')
                ->on('groups')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};