<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHinhanhvatdungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanhvatdung', function (Blueprint $table) {
            $table->increments('mahinhanh');
            $table->unsignedInteger('mavatdung');
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
        Schema::dropIfExists('hinhanhvatdung');
    }
}
