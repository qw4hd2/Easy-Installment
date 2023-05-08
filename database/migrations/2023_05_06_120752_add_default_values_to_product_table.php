<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValuesToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->decimal('p_value', 8, 2)->default(0)->change();
            $table->decimal('p_mprice', 8, 2)->default(0)->change();
            $table->decimal('p_newvalue', 8, 2)->default(0)->change();
            $table->integer('p_quantity')->default(0)->change();
            $table->string('p_supname')->default('')->change();
            $table->date('p_data')->default(date('Y-m-d'))->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product', function (Blueprint $table) {
            //
        });
    }
}
