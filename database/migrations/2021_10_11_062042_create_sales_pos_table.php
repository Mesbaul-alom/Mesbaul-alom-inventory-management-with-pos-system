<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesPosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_pos', function (Blueprint $table) {
            $table->id();

            $table->date('sales_date')->nullable();
            $table->string('created_by');
            $table->string('customer_name');
            $table->string('item_name')->nullable();
            $table->string('sales_code')->nullable();
            $table->string('sales_status')->nullable();
            $table->string('stock');
            $table->integer('quantity')->nullable();
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->integer('tex')->nullable();
            $table->integer('due')->nullable();
            $table->integer('payment_status')->nullable();
            $table->integer('paid_payment')->nullable();
            $table->integer('subtotal')->nullable();
            $table->integer('total_discount')->nullable();
            $table->integer('total_amount')->nullable();
            $table->integer('grand_total')->nullable();
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
        Schema::dropIfExists('sales_pos');
    }
}
