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
        Schema::create('serviceinfo', function(Blueprint $table){
            $table->increments('service_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('section');
            $table->string('email');
            $table->decimal('cost');
            $table->string('options');
            $table->integer('quantity');
            $table->string('date_placed');
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
        Schema::dropIfExists('serviceinfo');
    }
};
