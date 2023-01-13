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
        Schema::create('tackles', function (Blueprint $table) {
            $table->id();
            $table->string('tackle_name');
            $table->string('maker_name');
            $table->string('genre_name');
            $table->integer('amount');
            $table->datetime('purchase_date');
            $table->integer('purchase_fee');
            $table->string('detailed_info');
            $table->string('takle_photo');
            $table->boolean('stock_check');
            $table->string('fish_category');
            $table->integer('size');
            $table->integer('weight');
            $table->string('condition');
            $table->datetime('fishing_date');
            $table->string('fishingresult_photo');
            $table->boolean('share_stock');
            $table->boolean('deleted_flag');
            $table->integer('good_action_amount');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('tackles');
    }
};
