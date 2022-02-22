<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCthdvatdungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthdvatdung', function (Blueprint $table) {
            $table->increments('macthd');
            $table->unsignedInteger('mahoadon');
            $table->tinyText('tenloaivatdung');
            $table->tinyText('tenvatdung');
            $table->decimal('giaban',9,0);
            $table->integer('soluong');
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
        Schema::dropIfExists('cthdvatdung');
    }
}
