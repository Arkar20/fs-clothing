<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_details', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('item_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table
                ->foreignId('color_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table
                ->foreignId('size_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');

            $table->integer('quantity');

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
        Schema::dropIfExists('item_details');
    }
}
