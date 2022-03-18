<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_type', function (Blueprint $table) {
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant')
                ->references('id')
                ->on('restaurant');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type')
                ->references('id')
                ->on('type');

            $table->primary(['restaurant_id', 'type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_type');
    }
}
