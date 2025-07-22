<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_contact_us', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique(); // UUID
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('message',1000);
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
        Schema::dropIfExists('landing_contact_us');
    }
}
