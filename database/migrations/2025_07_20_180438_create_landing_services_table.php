<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_services', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique(); // UUID
            $table->unsignedBigInteger('user_id');
            $table->string('heading');
            $table->string('sub_heading');
            $table->string('icon');
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
        Schema::dropIfExists('landing_services');
    }
}
