<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id_fk');
            $table->string('user_photo')->null();
            $table->string('user_street');
            $table->text('user_tehseel');
            $table->text('user_city');
            $table->text('user_district');
            $table->string('user_zipcode');
            $table->string('user_phno');
            $table->string('user_date')->null();
            $table->string('user_month')->null();
            $table->string('user_year')->null();
            $table->string('user_phonetp')->null();
            $table->string('user_vehicle')->null();
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
        Schema::dropIfExists('user_profiles');
    }
}
