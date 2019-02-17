<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('scrum_master')->unsigned();
            $table->integer('product_owner')->unsigned();
            $table->integer('grupo')->unsigned();
            $table->timestamps();

            $table->foreign('scrum_master')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('product_owner')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('grupo')
                ->references('id')->on('grupos')
                ->onDelete('cascade');
        });

        Schema::create('sprints', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->integer('proyecto')->unsigned();
            $table->timestamps();

            $table->foreign('proyecto')
                ->references('id')->on('proyectos')
                ->onDelete('cascade');
        });

        Schema::create('specs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('descripcion');
            $table->integer('horas')->nullable();
            $table->integer('dificultad')->nullable();
            $table->integer('sprint')->nullable()->unsigned();
            $table->integer('proyecto')->unsigned();
            $table->timestamps();

            $table->foreign('sprint')
                ->references('id')->on('sprints')
                ->onDelete('cascade');
                
            $table->foreign('proyecto')
                ->references('id')->on('proyectos')
                ->onDelete('cascade');
        });

        Schema::create('users_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_group')->unsigned();
            $table->timestamps();

            $table->foreign('id_user')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('id_group')
                ->references('id')->on('grupos')
                ->onDelete('cascade');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_groups');
        Schema::dropIfExists('specs');
        Schema::dropIfExists('sprints');
        Schema::dropIfExists('proyectos');
        Schema::dropIfExists('grupos');
        
    }
}

