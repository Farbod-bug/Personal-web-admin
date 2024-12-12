<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('my_infos', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('email');
            $table->string('cellphone');
            $table->string('primary_image');
            $table->string('work_area');
            $table->string('work_history');
            $table->string('Number_of_customers');
            $table->string('Number_of_projects');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_infos');
    }
};
