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
        self::down();
        Schema::connection('pgsql_meeting')->create('attendes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meeting_id')->nullable()->unsigned();            
            $table->string('idcard');
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->text('observation')->nullable();
            $table->foreignId('entity_id')->references('id')->on('entities');            
            $table->foreignId('dependence_id')->references('id')->on('dependencies');
            $table->foreignId('position_id')->references('id')->on('positions');
            $table->foreign('meeting_id')->references('id')->on('meetings');
            $table->softDeletes();
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
