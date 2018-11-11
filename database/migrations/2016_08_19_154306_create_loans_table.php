<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('loan_id');
                $table->integer('member_id');
                $table->integer('cooporative_id');
                $table->string('loan_amount');
                $table->string('monthly_payment');
                $table->string('interest');
                $table->string('total_payment');
                $table->string('start_date');
                $table->string('end_date');
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
        Schema::drop('loans');
    }
}
