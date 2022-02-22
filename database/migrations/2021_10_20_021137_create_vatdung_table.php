<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVatdungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vatdung', function (Blueprint $table) {
            $table->increments('mavatdung');
            $table->string('tenvatdung');
            $table->unsignedInteger('maloaivatdung');
            $table->unsignedInteger('maloaithucung');
            $table->decimal('giaban',9,0);  
            $table->string('slug');   
            $table->tinyText('tieude');
            $table->text('noidung');
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
        Schema::dropIfExists('vatdung');
    }
}
