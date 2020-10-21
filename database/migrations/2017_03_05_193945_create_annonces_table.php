<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->text('short_desc');
            $table->longText('description');
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->integer('category_id')->unsigned();
             $table->foreign('category_id')->references('id')->on('categories');
             $table->integer('region_id')->unsigned();
             $table->foreign('region_id')->references('id')->on('regions');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annonces');
    }
}
