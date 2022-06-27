<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_lists', function (Blueprint $table) {

            $table->id();
            $table->foreignId('applications_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('applicants_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('rating')->nullable();
            $table->string('document')->nullable();
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
        Schema::dropIfExists('applicant_list');
    }
};
