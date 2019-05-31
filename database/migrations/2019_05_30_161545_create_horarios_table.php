<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('horario');
            $table->char('chegada')->nullable();
            $table->unsignedBigInteger('linha');
            $table->unsignedBigInteger('campus');
            $table->foreign('linha')->references('id')->on('linhas');
            $table->foreign('campus')->references('id')->on('campuses');
            $table->unique('horario','linha');
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
        Schema::dropIfExists('horarios');
    }
}
