<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('inv_no')->unique();
            $table->unsignedBigInteger('usr_id');
            $table->string('prod_ids');
            $table->string('discount_code');
            $table->integer('quantity');
            $table->double('sub_price');
            $table->double('discount');
            $table->double('total_price');
            $table->longText('shipping_address');
            $table->longText('billing_address');
            $table->string('pay_type');
            $table->string('pay_id');
            $table->string('pay_status')->comment('New, Pending, Processing, Completed, Cancelled');            
            $table->string('status')->comment('New, Pending, Processing, Completed, Cancelled');            
            $table->timestamp('pay_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('usr_id')->references('id')->on('web_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
