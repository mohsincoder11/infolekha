<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolInstituteDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_institute_detail', function (Blueprint $table) {
            $table->id();
            $table->string('school_institute')->default('');
            $table->string('address')->default('');
            $table->string('about')->default('');
            $table->string('pin_code')->default('');
            $table->string('oprating_since')->default('');
            $table->string('registration_no')->default('');
            $table->string('mob')->default('');
            $table->string('email')->default('');
            $table->string('website')->default('NA');
            $table->string('fb')->default('NA');
            $table->string('insta')->default('NA');
            $table->string('google')->default('NA');
            $table->string('yt')->default('NA');
            $table->string('school')->default('NA');
            $table->string('college')->default('NA');
            $table->string('institute')->default('NA');
            $table->string('course')->default('');
            $table->string('opening_time')->default('');
            $table->string('closing_time')->default('');
            $table->string('facilities')->default('');
            $table->string('image')->default('');
            $table->string('video')->default('');
            $table->string('declaration')->default('');
            $table->foreignId('users_id')->references('id')->on('users')->default('');
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
        Schema::dropIfExists('school_institute_detail');
    }
}
