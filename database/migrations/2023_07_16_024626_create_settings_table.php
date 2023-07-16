<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('school_name')->nullable()->unique();
            $table->string('school_logo')->nullable()->unique();
            $table->string('school_email')->nullable()->unique();
            $table->string('school_phone')->nullable()->unique();
            $table->string('school_type')->nullable()->unique(); //multiple or single school
            $table->string('country')->nullable()->unique();
            $table->string('paystack_pk')->nullable()->unique();
            $table->json('payment_method')->nullable();
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
        Schema::dropIfExists('settings');
    }
};