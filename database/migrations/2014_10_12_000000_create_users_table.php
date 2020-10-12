<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->Increments('idPersona');
            $table->string('Nombres',45);        
            $table->string('Apellidos',45);
            $table->string('Dni',45);    
            $table->integer('GeneroId');
            $table->date('FechaNacimiento');
            $table->string('Celular',45);
            $table->string('Email',45);
            $table->string('UserName',45);  
            $table->string('password');
            $table->string('CodigoDepartamento',2);
            $table->string('CodigoProvincia',2); 
            $table->string('CodigoDistrito',2); 
            $table->string('Foto',100);
            $table->dateTime('FechaRegistro');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona');
    }
}
