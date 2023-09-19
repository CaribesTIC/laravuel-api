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
        Schema::connection('pgsql_meeting')->create('dependencies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->unique('name');
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
        //Schema::connection('pgsql_meeting')->dropIfExists('agreements');
        Schema::connection('pgsql_meeting')->dropIfExists('attendes');
        //Schema::connection('pgsql_meeting')->dropIfExists('approaches');
        //Schema::connection('pgsql_meeting')->dropIfExists('meetings');
        //Schema::connection('pgsql_meeting')->dropIfExists('people');
        //Schema::connection('pgsql_meeting')->dropIfExists('countries');
        Schema::connection('pgsql_meeting')->dropIfExists('dependencies');
    }
};
