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
        Schema::create('tache_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tache_id');
            $table->foreign('tache_id', 'tache_id_fk_6691400')->references('id')->on('taches')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_6691400')->references('id')->on('users')->onDelete('cascade');
        
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tache_user');
    }
};
