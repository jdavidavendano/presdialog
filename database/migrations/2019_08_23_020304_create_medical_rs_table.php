<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalRsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_rs', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('email')->unique();
            $table->string('gender');
            $table->date('birthDate');
            $table->string('bloodType');
            $table->foreign('email')->references('email')->on('users');
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
        Schema::dropIfExists('medical_rs');
    }
}
