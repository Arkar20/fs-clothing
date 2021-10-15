<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table
                ->text('img1')
                ->default(null)
                ->nullable();
            $table
                ->text('img2')
                ->default(null)
                ->nullable();
            $table
                ->text('img3')
                ->default(null)
                ->nullable();
            $table
                ->foreignId('category_id')
                ->nullable()
                ->constrained()
                ->onDelete('Set Null');
            $table
                ->foreignId('brand_id')
                ->nullable()
                ->constrained()
                ->onDelete('Set Null');
            $table->foreignId('user_id')->constrained();
            $table->string('desc');
            $table->integer('price');
            $table->integer('retail_price');
            $table->integer('total_qty')->default(0);
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
        Schema::dropIfExists('items');
    }
}
