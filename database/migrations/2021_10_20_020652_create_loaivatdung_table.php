<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaivatdungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaivatdung', function (Blueprint $table) {
            $table->increments('maloaivatdung');
            $table->unsignedInteger('maloaisanpham');
            $table->tinyText('tenloaivatdung');
            $table->string('slug');
            $table->text('hinhanh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaivatdung');
    }
}
