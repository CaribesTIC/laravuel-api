<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//class AlterUsersTableForeignRole extends Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->integer('role_id')->default(2);
            $table->foreignId('role_id')->default(2)->references('id')->on('roles');            
            $table->boolean('is_admin')->default(false);
            $table->string('avatar')->nullable();
            $table->softDeletes();           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
               $table->dropColumn('role_id');
               $table->dropColumn('is_admin');
               $table->dropColumn('avatar');
               $table->dropSoftDeletes();              
        });
    }
};
