<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHinhanhthucungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanhthucung', function (Blueprint $table) {
            $table->increments('mahinhanh');
            $table->unsignedInteger('mathucung');
            $table->text('hinhanh');
            $table->boolean('anhdaidien');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhanhthucung');
    }
}
