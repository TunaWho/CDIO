<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_comment', function (Blueprint $table) {
            $table->Increments('com_id');
            $table->string('com_email');
            $table->string('com_name');
            $table->string('com_content');
            $table->integer('com_product')->unsigned();
            $table->foreign('com_product')
            ->references('prod_id')
            ->on('vp_sanpham')
            ->onDelete('cascade');
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
        Schema::dropIfExists('vp_comment');
    }
}
