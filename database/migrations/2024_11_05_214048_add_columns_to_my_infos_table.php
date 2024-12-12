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
        Schema::table('my_infos', function (Blueprint $table) {
            $table->string('about_title')->after('primary_image');
            $table->string('about_title2')->after('about_title');
            $table->text('about_description')->after('about_title2');
            $table->string('instagram_address')->after('about_description');
            $table->string('telegram_address')->after('instagram_address');
            $table->string('whatsapp_address')->after('telegram_address');
            $table->string('github_address')->after('whatsapp_address');
            $table->string('linkedin_address')->after('github_address');
            $table->string('discord_address')->after('linkedin_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('my_infos', function (Blueprint $table) {
            //
        });
    }
};
