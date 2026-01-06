<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('favicon')->nullable();
            $table->string('menu_logo')->nullable();
            $table->string('logo')->nullable();
            $table->longText('meta_header')->nullable();
            $table->string('site_color')->nullable();
            $table->longText('meta_footer')->nullable();
            $table->text('site_info')->nullable();
            $table->text('fb_link')->nullable();
            $table->text('insta_link')->nullable();
            $table->text('yt_link')->nullable();
            $table->text('tiktok_link')->nullable();
            $table->longText('header_custom_code')->nullable();
            $table->longText('footer_custom_code')->nullable();
            $table->string('office_mobile')->nullable();
            $table->string('office_email')->nullable();
            $table->string('office_address')->nullable();
            $table->text('banner')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
