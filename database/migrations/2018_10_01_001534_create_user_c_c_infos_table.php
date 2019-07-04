<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCCInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_c_c_infos', function (Blueprint $table) {
            $table->increments('user_id');
            $table->integer('tasker_id_fk');
            $table->integer('user_cc');
            $table->integer('user_exp_month');
            $table->integer('user_exp_year');
            $table->integer('user_sc');
            $table->integer('user_zc');
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
        Schema::dropIfExists('user_c_c_infos');
    }
}
