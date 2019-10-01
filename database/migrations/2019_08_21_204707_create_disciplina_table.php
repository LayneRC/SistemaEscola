<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplina', function (Blueprint $table) {
            $table->bigIncrements('cddisciplina');
            $table->timestamps();
            $table->string('nomedisciplina', 40);
            $table->bigInteger('cdprofessor')->unsigned();
            $table->decimal('valor', 7,2);
            
            $table->foreign('cdprofessor')->references('cdprofessor')->on('professor');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplina');
    }
}
