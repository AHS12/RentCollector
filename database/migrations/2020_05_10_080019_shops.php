<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->text('address');
            $table->text('picture_path')->nullable();
            $table->string('conecrn_person');
            $table->string('conecrn_phone_no');
            $table->string('conecrn_nid_birth_passport');
            $table->string('conecrn_picture_path')->nullable();
            $table->string('conecrn_document_picture_path')->nullable();
            $table->integer('status')->default(0);
            $table->string('created_by');
            $table->string('updated_by');
            $table->boolean('soft_delete')->default(0);
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
