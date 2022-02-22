<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCthdthucungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthdthucung', function (Blueprint $table) {
            $table->increments('macthd');
            $table->unsignedInteger('mahoadon');
            $table->tinyText('tenloaithucung');
            $table->tinyText('tengiongthucung');
            $table->decimal('giaban',9,0);
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
        Schema::dropIfExists('cthdthucung');
    }
}
