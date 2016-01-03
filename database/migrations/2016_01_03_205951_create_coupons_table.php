<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 255);
            $table->string('code', 255);
            $table->enum('type', ['onetime', 'repeating']);
            $table->text('description')->nullable();
            $table->integer('percent_off');
            $table->decimal('amount_off', 10, 2);
            $table->timestamp('expire_at');
            $table->integer('times_redeemed');
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
        Schema::drop('coupons');
    }
}
