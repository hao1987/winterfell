<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart_items', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 255);
            $table->string('shopping_cart_id', 255);
            $table->string('product_id', 255);
            $table->integer('quantity');
            $table->decimal('subtotal', 19, 2);
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shopping_cart_items');
    }
}
