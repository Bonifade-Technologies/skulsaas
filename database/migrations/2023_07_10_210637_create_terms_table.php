<?php

use App\Models\Year;
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
        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tenant::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Year::class)->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->date('start');
            $table->date('end');
            $table->integer('dso')->nullable();
            $table->boolean('is_current')->default(false);
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
        Schema::dropIfExists('terms');
    }
};