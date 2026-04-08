<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('formulario_metro', function (Blueprint $table) {
            $table->id();
            $table->string('razones_diligenciamiento', 60);
            $table->string('tipo_documento', 10);
            $table->string('numero_documento', 20);
            $table->string('primer_nombre', 80);
            $table->string('segundo_nombre', 80)->nullable();
            $table->string('primer_apellido', 80);
            $table->string('segundo_apellido', 80)->nullable();
            $table->string('nombres_apellidos_civica', 200);
            $table->string('genero', 20);
            $table->string('cual', 80)->nullable();
            $table->string('viaprincipal', 255)->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('prefijo1', 20)->nullable();
            $table->string('nombrevia', 80)->nullable();    
            $table->string('viasecundaria', 20)->nullable();
            $table->string('prefijo2', 20)->nullable();
            $table->string('cuadrante', 20)->nullable();
            $table->string('placa', 20)->nullable();        
            $table->string('complemento', 255)->nullable();
            $table->string('municipio_residencia', 80)->nullable();
            $table->string('comuna_corregimiento', 120)->nullable();
            $table->string('barrio', 120)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('estrato_socioeconomico', 10)->nullable();
            $table->string('sisben', 20)->nullable();
            $table->string('celular', 30)->nullable();
            $table->string('nivel_academico', 40)->nullable();
            $table->string('grado', 10)->nullable();
            $table->string('semestre', 10)->nullable();
            $table->string('numero_civica', 30);
            $table->boolean('presenta_discapacidad')->default(false);
            $table->string('tipo_discapacidad', 120)->nullable();
            $table->string('beneficio_sapiencia', 80)->nullable();
            $table->timestamps();
            $table->string('doc_identidad')->nullable();
            $table->string('publicos')->nullable();
            $table->string('civica')->nullable();
            $table->string('discapacidad')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formulario_metro');
    }
};
