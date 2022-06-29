<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('taches', function (Blueprint $table) {
            $table->unsignedBigInteger('nom_projet_id')->nullable();
            $table->foreign('nom_projet_id', 'nom_projet_fk_6698801')->references('id')->on('projects');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
};
