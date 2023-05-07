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
        Schema::connection('pgsql_meeting')->create('approaches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meeting_id')->nullable()->unsigned();
            $table->string('approach');
            $table->string('speaker');
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
        Schema::connection('pgsql_meeting')->dropIfExists('approaches');
    }
};
