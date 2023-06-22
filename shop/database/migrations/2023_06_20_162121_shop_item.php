<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShopItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('shop_item', function (Blueprint $table) {
            $table->id('id_shopItem');
            $table->string('name', '25');
            $table->string('about', '100');
            $table->decimal('price', '11', '2');
            $table->string('imagePath', '255');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->index(['name', 'price', 'user_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_item');
    }
}
