<?php

use App\Models\Tenant;
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
            $table->foreignIdFor(Tenant::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('school_name')->nullable();
            $table->string('school_logo')->nullable();
            $table->string('school_email')->nullable();
            $table->string('staff_prefix')->nullable();
            $table->string('student_prefix')->nullable();
            $table->string('parent_prefix')->nullable();
            $table->string('school_country')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country_currency')->nullable();
            $table->json('currencies')->nullable();
            $table->string('school_phone')->nullable();
            $table->string('school_type')->nullable(); //multiple or single school
            $table->string('paystack_pk')->nullable();
            $table->json('payment_method')->nullable();
            $table->softDeletes();
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