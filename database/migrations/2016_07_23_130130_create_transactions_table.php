<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            $table->increments('transaction_id');
                $table->integer('member_id');
                $table->integer('transaction_type_id');
                $table->string('narrative');
                $table->boolean('transaction_status');
                $table->string('transaction_amount');
                $table->string('account_balance');
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
        Schema::drop('transactions');
    }
}
