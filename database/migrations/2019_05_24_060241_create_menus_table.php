<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name_en', 255);
            $table->string('name_ar', 255);
            $table->integer('menu_type_id');
            $table->integer('page_id')->nullable();
            $table->integer('order')->default(0);
            $table->enum('status', [0,1])->default(1)->comment('0: inactive, 1: active (default value)');
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
        Schema::dropIfExists('menus');
    }
}
