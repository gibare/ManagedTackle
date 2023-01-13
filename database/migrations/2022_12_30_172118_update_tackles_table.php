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
        Schema::table('tackles', function (Blueprint $table) {
            //
            $table->boolean('stock_check')->default(0)->change();
            $table->boolean('share_stock')->default(0)->change();
            $table->integer('good_action_amount')->default(0)->change();
            $table->string('tackle_name')->nullable(false)->change();
            $table->string('maker_name')->nullable(false)->change();
            $table->string('genre_name')->nullable(false)->change();
            $table->string('tackle_name')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tackles', function (Blueprint $table) {
            //
            $table->string('tackle_name')->nullable()->change();
            $table->string('maker_name')->nullable()->change();
            $table->string('genre_name')->nullable()->change();
            $table->string('tackle_name')->nullable()->change();
        });
    }
};
