<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignkeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('giongthucung', function (Blueprint $table) {
            $table->foreign('maloaithucung')->references('maloaithucung')->on('loaithucung')->onDelete('cascade');
        });
        Schema::table('thucung', function (Blueprint $table) {
            $table->foreign('magiongthucung')->references('magiongthucung')->on('giongthucung');
        });
        Schema::table('vatdung', function (Blueprint $table) {
            $table->foreign('maloaivatdung')->references('maloaivatdung')->on('loaivatdung');
            $table->foreign('maloaithucung')->references('maloaithucung')->on('loaithucung');
        });
        
        Schema::table('loaithucung', function (Blueprint $table) {
            $table->foreign('maloaisanpham')->references('maloaisanpham')->on('loaisanpham');
        });
        
        Schema::table('loaivatdung', function (Blueprint $table) {
            $table->foreign('maloaisanpham')->references('maloaisanpham')->on('loaisanpham');
        });
        
        Schema::table('hinhanhthucung', function (Blueprint $table) {
            $table->foreign('mathucung')->references('mathucung')->on('thucung')->onDelete('cascade');
        });
        Schema::table('hinhanhvatdung', function (Blueprint $table) {
            $table->foreign('mavatdung')->references('mavatdung')->on('vatdung')->onDelete('cascade');
        });
        Schema::table('hoadon', function (Blueprint $table) {
            $table->foreign('idUser')->references('id')->on('users');
        });
        Schema::table('cthdthucung', function (Blueprint $table) {
            $table->foreign('mahoadon')->references('mahoadon')->on('hoadon');
        });
        Schema::table('cthdvatdung', function (Blueprint $table) {
            $table->foreign('mahoadon')->references('mahoadon')->on('hoadon');
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreignkey');
    }
}
