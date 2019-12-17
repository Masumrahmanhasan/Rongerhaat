<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoftwareUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->bigInteger('access_code')->unique();
            $table->string('role');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->integer('nid')->nullable();
            $table->string('image');
            $table->string('birth_date');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('verify_token');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zip_code');
            $table->string('address');
            $table->integer('status')->comment('0 = Inactive, 1 = Active');
            $table->integer('online')->comment('0 = Inactive, 1 = Active');
            $table->timestamp('login_at')->nullable();
            $table->timestamp('logout_at')->nullable();
            
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('software_users');
    }
}
