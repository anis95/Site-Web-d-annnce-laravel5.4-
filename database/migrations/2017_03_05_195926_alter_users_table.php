<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname')->default('test');
            $table->date('birthday')->default('2017-04-02');
            $table->string('phone')->default('00000000');
            $table->string('role')->default('user');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table){
                $table->dropColum('lastname');
                $table->dropColum('birthday');
                $table->dropColum('phone');
                $table->dropColum('role');
                $table->dropColum('image_id');

        });
    }
}
