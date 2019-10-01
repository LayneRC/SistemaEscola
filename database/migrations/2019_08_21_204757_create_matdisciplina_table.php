<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatdisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matdisciplina', function (Blueprint $table) {
            $table->bigIncrements('cdmatdisciplina');
            $table->timestamps();
            $table->bigInteger('cdmatricula')->unsigned();
            $table->bigInteger('cddisciplina')->unsigned();
            $table->decimal('valor', 7,2);

            $table->foreign('cdmatricula')->references('cdmatricula')->on('matricula');
            $table->foreign('cddisciplina')->references('cddisciplina')->on('disciplina');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matdisciplina');
    }
}
