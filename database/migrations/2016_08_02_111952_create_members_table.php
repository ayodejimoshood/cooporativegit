<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('member_id');
                $table->string('title');
                $table->string('firstname');
                $table->string('lastname');
                $table->string('telephone');
                //$table->string('state_id');
                $table->string('address');
                $table->integer('cooporative_id');
                $table->integer('privilege_id');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('next_of_kin_name');
                $table->string('next_of_kin_email');
                $table->string('next_of_kin_number');
                $table->string('next_of_kin_address');
                $table->boolean('user_status');
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
        Schema::drop('members');
    }
}
