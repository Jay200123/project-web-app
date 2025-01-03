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
        Schema::create('loginfo', function(Blueprint $table){
            $table->increments('log_id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->string('position');
            $table->date('log_date');
            $table->string('timeIn');
            $table->string('timeOut');
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
        Schema::dropIfExists('loginfo');
    }
};
