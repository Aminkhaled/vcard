<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vcards', function (Blueprint $table) {
            $table->id();
            $table->string('cardName')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('avatar')->default('avatar.jpg');
            $table->string('logo')->default('avatar.jpg');
            $table->date('birthday')->nullable();
            $table->string('title','255')->nullable();
            $table->string('organisationName','255')->nullable();
            $table->string('positionTitle','255')->nullable();
            $table->string('notes','500')->nullable();
            $table->unsignedBigInteger('user_id');

            // You don't need separate schema code to create foreign
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('vcards');
    }
}
