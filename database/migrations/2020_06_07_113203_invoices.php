<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Invoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('aprt_id')->unsigned()->nullable();
            $table->foreign('aprt_id')->references('id')->on('apertments');
            $table->integer('shop_id')->unsigned()->nullable();
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->integer('rent_id')->unsigned()->nullable();
            $table->foreign('rent_id')->references('id')->on('rents');
            $table->date('date_issue');
            $table->date('date_due')->nullable();
            $table->string('inv_no');
            $table->string('inv_name');
            $table->string('bill_name');
            $table->string('bill_address');
            $table->string('bill_email');
            $table->string('bill_phone');
            $table->string('bill_note');
            $table->double('original_rent',12,2)->nullable();
            $table->double('collected_rent',12,2)->nullable();
            $table->double('advance',12,2)->nullable();
            $table->double('due',12,2)->nullable();
            $table->double('expense',12,2)->nullable();
            $table->integer('status')->default(0);
            $table->text('invoice_file_path');
            $table->string('created_by');
            $table->string('updated_by');
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
        //
    }
}
