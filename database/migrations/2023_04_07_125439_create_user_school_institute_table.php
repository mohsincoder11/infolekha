<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSchoolInstituteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_school_institute', function (Blueprint $table) {
            $table->id();
            $table->string('r_name');
            $table->string('r_contact_person');
            $table->string('r_mob');
            $table->string('r_email');
            $table->string('r_state');
            $table->string('r_city');
            $table->string('r_password');
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
        Schema::dropIfExists('user_school_institute');
    }
}
