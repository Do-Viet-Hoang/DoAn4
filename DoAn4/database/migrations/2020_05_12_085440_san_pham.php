<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SanPham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_loai');
            $table->foreign('id_loai')->references('id')->on('loai_sp')->onDelete("cascade");
            $table->string('name');
            $table->string('hangsp');
            $table->Integer('gia');
            $table->string('manhinh');
            $table->string('hedieuhanh');
            $table->string('cpu');
            $table->string('cameratruoc');
            $table->string('camerasau');
            $table->string('ram');
            $table->string('bonho');
            $table->string('sim');
            $table->string('pin');
            $table->string('hinhanh');
            $table->rememberToken();
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
