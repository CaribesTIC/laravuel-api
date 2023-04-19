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
        Schema::connection('pgsql_meeting')->create('attendes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meeting_id')->nullable()->unsigned();            
            $table->string('idcard');
            $table->string('fullname');
            $table->integer('entity_id')->default(1);
            $table->integer('dependence_id')->default(1);
            $table->integer('position_id')->default(1);
            $table->string('email');
            $table->string('phone');
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
        Schema::connection('pgsql_meeting')->dropIfExists('attendes');
    }
};
