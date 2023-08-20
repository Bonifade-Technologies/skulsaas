<?php

use App\Models\Tenant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenant::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('profileable_id');
            $table->string('profileable_type');
            $table->string('gender')->nullable();
            $table->string('blood')->nullable();
            $table->string('address')->nullable();
            $table->string('occupation')->nullable();
            $table->date('admitted')->nullable(); //it can be date employed or dated admitted for students
            $table->string('disability')->nullable();
            $table->string('religion')->nullable();
            $table->json('hobbies')->nullable();
            $table->string('status')->nullable()->default('active');
            $table->string('reg_class')->nullable();
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
        Schema::dropIfExists('profiles');
    }
};