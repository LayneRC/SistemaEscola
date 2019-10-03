<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->bigIncrements('cdnota');
            $table->timestamps();
            $table->bigInteger('cdmatdisciplina')->unsigned();
            $table->decimal('nota', 7,2);
            $table->string('referencia', 20);
            $table->char('status', 2);

            $table->foreign('cdmatdisciplina')->references('cdmatdisciplina')->on('matdisciplina');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota');
    }
}
