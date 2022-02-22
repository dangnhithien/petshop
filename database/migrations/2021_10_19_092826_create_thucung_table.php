<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThucungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thucung', function (Blueprint $table) {
            $table->increments('mathucung');
            $table->unsignedInteger('magiongthucung');
            $table->string('slug');
            $table->tinyText('tieude');
            $table->text('noidung');
            $table->decimal('giaban',9,0);
            $table->date('ngaydang');
            
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thucung');
    }
}
