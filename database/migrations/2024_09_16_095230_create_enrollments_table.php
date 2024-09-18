<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_of_join');
            $table->string('door_no');
            $table->string('district');
            $table->string('street_nagar');
            $table->string('pin');
            $table->string('village');
            $table->string('post_office');
            $table->string('state');
            $table->string('country');
            $table->string('diocese');
            $table->string('mobile_no');
            $table->string('whatsapp_no');
            $table->string('email');
            $table->json('family_details')->nullable();
            $table->json('death_anniversary')->nullable();
            $table->text('any_other_intention')->nullable();
            $table->string('signature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
