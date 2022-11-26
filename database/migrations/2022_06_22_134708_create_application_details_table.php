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
        Schema::create('application_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applications_id')->constrained()->cascadeOnDelete();
            $table->text('description');
            $table->string('years_in_city');
            $table->string('family_income');
            $table->string('educational_attainment');
            $table->string('gwa');
            $table->string('nationality');
            $table->string('city');
            $table->string('registered_voter');
            $table->string('documentary_requirement');
            $table->string('application_form');
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
        Schema::dropIfExists('application_details');
    }
};
