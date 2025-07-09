<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactNoToTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gardian_name');
            $table->string('cnic_no');
            $table->string('contact_no');
            $table->date('joining_date');
            $table->string('off_email');
            $table->string('pers_email');
            $table->date('dob');
            $table->text('current_address');
            $table->text('perm_address');
            $table->bigInteger('desg_id');
            $table->string('last_degree');
            $table->string('current_degree');
            $table->bigInteger('vehicle_id');
            $table->string('emg_name');
            $table->string('emg_contact_no');
            $table->string('emg_relation');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
