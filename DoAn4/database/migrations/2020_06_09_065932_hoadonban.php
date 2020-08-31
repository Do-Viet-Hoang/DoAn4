<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hoadonban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tk');
            $table->foreign('id_tk')->references('id')->on('users')->onDelete("cascade");
            $table->string('hoten');
            $table->string('diachi');
            $table->char('sdt');
            $table->string('chuthich')->nullable();
            $table->tinyInteger('trangthai');
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
