<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsvimportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csvimports', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('quote_no')->unique();
            $table->string('employee_id');
            $table->string('employee_name');
            $table->string('relation');
            $table->string('doj');
            $table->string('dob');
            $table->string('gender');
            $table->string('age');
            $table->string('email_id');
            $table->string('mobile_no');
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
        Schema::dropIfExists('csvimports');
    }
}
