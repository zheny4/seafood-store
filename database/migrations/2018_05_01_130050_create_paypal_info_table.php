<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaypalInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paypal_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('txnid')->nullable($value = false);
            $table->decimal('payment_amount', 7, 2);
            $table->string('payment_status')->nullable($value = false);
            $table->string('itemid')->nullable($value = false);
            $table->date('createdtime')->nullable($value = false);
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
        Schema::dropIfExists('paypal_info');
    }
}
