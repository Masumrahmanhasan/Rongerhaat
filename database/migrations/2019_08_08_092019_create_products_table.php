<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('post_id')->unique();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('sub_cat_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('name');
            $table->longText('description');
            $table->string('colors');
            $table->string('size');
            $table->double('price');
            $table->double('discount');
            $table->integer('quantity');
            $table->integer('views');

            $table->string('meta_title');
            $table->longText('meta_keywords');
            $table->longText('meta_desc');
            
            $table->integer('status')->comment('0 = Inactive, 1 = Active');
            
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('cat_id')->references('id')->on('category')->onDelete('cascade');
            $table->foreign('sub_cat_id')->references('id')->on('sub_category')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('sub_category')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('software_users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('software_users')->onDelete('cascade');
            $table->foreign('deleted_by')->references('id')->on('software_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
