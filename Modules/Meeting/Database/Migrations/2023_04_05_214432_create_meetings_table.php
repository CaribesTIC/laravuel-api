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
        Schema::connection('mysql_meeting')->create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->default(1);
            $table->date('app_date')->default(date("Y-m-d"));
            $table->time('start_time')->default(date("H:i:s"));            
            $table->string('place');
            $table->integer('entity_id')->default(1);
            $table->integer('dependence_id')->default(1);
            $table->string('subject');
            $table->string('reason');
            $table->text('observation')->nullable();
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
        Schema::connection('mysql_meeting')->dropIfExists('meetings');
    }
};
