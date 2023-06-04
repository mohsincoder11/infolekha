<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_student', function (Blueprint $table) {
            $table->id();
            $table->string('r_name');
            $table->string('r_current_school_institute');
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
        Schema::dropIfExists('user_student');
    }
}
