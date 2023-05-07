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
        Schema::connection('pgsql_client')->create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->unique('name');
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
        Schema::connection('pgsql_client')->dropIfExists('clients');
        Schema::connection('pgsql_client')->dropIfExists('countries');
    }
};
