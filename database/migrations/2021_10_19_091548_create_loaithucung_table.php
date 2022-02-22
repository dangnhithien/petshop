<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoaithucungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaithucung', function (Blueprint $table) {
            $table->increments('maloaithucung');
            $table->unsignedInteger('maloaisanpham');
            $table->tinyText('tenloaithucung');
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
        Schema::dropIfExists('loaithucung');
    }
}
