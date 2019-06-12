<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueAndUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('linhas',function($table){
            $table->dropColumn('urlMaps');
        });
        Schema::table('campuses',function($table){
            $table->string('urlMaps');
        });
        
        Schema::table('horarios',function($table){
            $table->unique(['horario','linha']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('campuses',function($table){
            $table->dropColumn('urlMaps');
        });
        Schema::table('horarios',function($table){
            $table->dropUnique('horarios_horario_linha_unique');
        });
    }
}
