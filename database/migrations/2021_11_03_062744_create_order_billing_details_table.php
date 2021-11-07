<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBillingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_billing_details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('name');
            $table->string('email_address');
            $table->string('phone_number');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->string('address');
            $table->string('house_flat')->nullable();
            $table->integer('postcode');
            $table->string('note');
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
        Schema::dropIfExists('order_billing_details');
    }
}