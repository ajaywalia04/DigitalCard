<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandingPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique(); // UUID
            $table->unsignedBigInteger('user_id');
            $table->string('main_heading');
            $table->string('sub_heading');
            $table->string('about_us',1000);
            $table->string('service_heading');
            $table->string('contact_sub_heading');
            $table->string('slug')->unique();
            $table->string('color_no');
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
        Schema::dropIfExists('landing_pages');
    }
}
