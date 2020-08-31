<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chitiethoadonban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiethoadonban', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hdb');
            $table->foreign('id_hdb')->references('id')->on('hoadonban')->onDelete("cascade");
            $table->unsignedBigInteger('id_sp');
            $table->foreign('id_sp')->references('id')->on('san_pham')->onDelete("cascade");
            $table->Integer('soluong');
            $table->Integer('gia');
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
