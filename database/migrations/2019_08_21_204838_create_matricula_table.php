<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matricula', function (Blueprint $table) {
            $table->bigIncrements('cdmatricula');
            $table->timestamps();
            $table->bigInteger('cdcurso')->unsigned();
            $table->bigInteger('cdaluno')->unsigned();
            $table->bigInteger('cdsemestre')->unsigned();
            $table->bigInteger('cdturma')->unsigned();
            $table->decimal('valor', 7,2);

            $table->foreign('cdcurso')->references('cdcurso')->on('curso');
            $table->foreign('cdaluno')->references('cdaluno')->on('aluno');
            $table->foreign('cdsemestre')->references('cdsemestre')->on('semestre');
            $table->foreign('cdturma')->references('cdturma')->on('turma');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matricula');
    }
}
