<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('aprt_id')->unsigned()->nullable();
            $table->foreign('aprt_id')->references('id')->on('apertments');
            $table->integer('shop_id')->unsigned()->nullable();
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->date('date');
            $table->string('month');
            $table->double('original_rent',12,2)->nullable();
            $table->double('rent',12,2)->nullable();
            $table->double('advance',12,2)->nullable();
            $table->double('due',12,2)->nullable();
            $table->double('expense',12,2)->nullable();
            $table->integer('status')->default(0);
            $table->string('created_by');
            $table->string('updated_by');
            $table->boolean('soft_delete')->default(0);
            $table->softDeletes();
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
        //
    }
}
