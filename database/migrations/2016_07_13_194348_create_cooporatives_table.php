<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCooporativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cooporatives', function (Blueprint $table) {
            $table->increments('cooporative_id');
                $table->string('cooporative_name');
                $table->string('cooporative_desc');
                //$table->integer('privilege_id');
                $table->integer('lga_id');
                $table->integer('contact_name');
                $table->integer('contact_number');
                $table->integer('contact_email');
                //$table->string('email')->unique();
                //$table->string('password');
                $table->boolean('cooporative_status');
                $table->rememberToken();
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
        Schema::drop('cooporatives');
    }
}
