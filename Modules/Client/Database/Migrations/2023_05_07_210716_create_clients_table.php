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
        Schema::connection('pgsql_client')->create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->boolean('type'); //true=natural ; false=legal
            $table->string('identification_card')->unique();
            $table->string('business_name');
            $table->string('phone');            
            $table->foreignId('country_id')->references("id")->on("countries");          
            $table->text('domicile');
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
        Schema::connection('pgsql_client')->dropIfExists('clients');
    }
};
