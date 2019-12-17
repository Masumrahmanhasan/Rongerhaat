<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('inv_id');
            $table->unsignedBigInteger('usr_id');
            $table->unsignedBigInteger('prod_id');
            $table->integer('quantity');
            $table->double('price');
            $table->double('sub_price');
            $table->longText('prod_data');
            $table->string('status')->comment('New, Pending, Processing, Completed, Cancelled');            
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('inv_id')->references('id')->on('invoice')->onDelete('cascade');
            $table->foreign('usr_id')->references('id')->on('web_users')->onDelete('cascade');
            $table->foreign('prod_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
