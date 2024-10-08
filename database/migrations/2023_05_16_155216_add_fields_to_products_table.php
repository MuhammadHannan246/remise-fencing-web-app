<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('weight')->default(0);
            $table->string('weight_unit')->default('cm');
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->integer('depth')->default(0);
            $table->string('dimention_unit')->default('cm');
            $table->string('hs_code')->default('100');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
