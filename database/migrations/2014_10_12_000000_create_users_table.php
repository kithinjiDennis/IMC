<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('role_id')->default(1)->comment('1: admin, 2: sub-admin');
            $table->string('name', 100);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->enum('status', [0,1,2])->default(1)->comment('0: blocked, 1: active (default value), 2: deleted');
            $table->longText('auth_token')->nullable();
            $table->longText('forgot_password_token')->nullable();
            $table->longText('remember_token')->nullable();
            $table->bigInteger('created_at');
            $table->bigInteger('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
