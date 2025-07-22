<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_cards', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique(); // UUID
            $table->unsignedBigInteger('user_id');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('job_title')->nullable();
            $table->string('department')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('bio', 1000)->nullable();
            $table->string('phone_no')->nullable();
            $table->string('card_no');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('my_cards');
    }
}
