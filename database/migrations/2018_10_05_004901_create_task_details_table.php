<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id_fk');
            $table->text('task_name');
            $table->text('task_category');
            //$table->text('task_interest');
            $table->string('task_location');
            //$table->integer('task_aptno');
            $table->string('task_completiondate');
            $table->string('task_duration');
            $table->string('task_details');
            $table->text('tasker_name')->nullable();
            $table->string('task_date')->nullable();
            $table->string('task_status')->nullable();
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
        Schema::dropIfExists('task_details');
    }
}
