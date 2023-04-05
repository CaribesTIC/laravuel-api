<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql_meeting')->create('agreements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meeting_id')->nullable()->unsigned();
            $table->string('agreement');
            $table->string('responsible');
            $table->text('observation')->nullable();            
            $table->foreign('meeting_id')->references('id')->on('meetings');
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
        Schema::connection('mysql_meeting')->dropIfExists('agreements');
    }
};