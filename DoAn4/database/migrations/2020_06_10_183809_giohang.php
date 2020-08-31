<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Giohang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giohang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tk');
            $table->foreign('id_tk')->references('id')->on('users')->onDelete("cascade");
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('san_pham')->onDelete("cascade");
            $table->string('name')->nullable();
            $table->Integer('gia')->nullable();
            $table->Integer('tong')->nullable();
            $table->Integer('soluong');
            $table->string('hinhanh')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
