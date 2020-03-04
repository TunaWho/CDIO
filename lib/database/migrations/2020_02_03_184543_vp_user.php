<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpUser extends Migration
{
    protected $table = 'vp_users';
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        
        Schema::create('vp_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email');
            $table->string('password');
            $table->tinyInteger('level');
            $table->rememberToken();
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
        Schema::dropIfExists('vp_users');
    }
}
