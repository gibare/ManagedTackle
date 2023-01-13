<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('makernames', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->default(0); // メーカー番号(value)
            $table->text('name'); // メーカー名(name)
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
        Schema::drop('makernames');
    }
};
