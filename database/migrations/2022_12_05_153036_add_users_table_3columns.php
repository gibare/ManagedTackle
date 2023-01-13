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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->boolean('deleted_flag')->after('remember_token');
            $table->string('favorite_maker_name')->after('remember_token');
            $table->integer('angler_years')->nullable(true)->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('deleted_flag');
            $table->dropColumn('favorite_maker_name');
            $table->dropColumn('angler_years');
        });
    }
};
