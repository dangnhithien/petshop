<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiongthucungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giongthucung', function (Blueprint $table) {
            $table->increments('magiongthucung');
            $table->tinyText('tengiongthucung');
            $table->string('slug');
            $table->unsignedInteger('maloaithucung');
            $table->text("mota");
            $table->text("hinhanh");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giongthucung');
    }
}
