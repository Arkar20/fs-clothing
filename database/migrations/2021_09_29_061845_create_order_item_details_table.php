<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item_details', function (Blueprint $table) {
             $table->id();
            $table->bigInteger('item_detail_id')->unsigned();
            $table
                ->foreign('item_detail_id')
                ->references('id')
                ->on('item_details');

            $table
                ->foreignId('order_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->integer('quantity');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_item_details');
    }
}
