<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_detail', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('class');
            $table->string('mob');
            $table->string('email');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('pin_code');
            $table->string('image');
            $table->foreignId('user_student_id');
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
        Schema::dropIfExists('student_detail');
    }
}
