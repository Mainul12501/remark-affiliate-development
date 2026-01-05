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
        Schema::create('user_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->text('bio')->nullable();
            $table->float('current_balance')->default(0);
            $table->float('total_conversion')->default(0);
            $table->float('total_earnings')->default(0);
            $table->text('tiktalk_profile_link')->nullable();
            $table->tinyInteger('is_tiktalk_varified')->default(0);
            $table->text('fb_profile_link')->nullable();
            $table->tinyInteger('is_fb_verified')->default(0);
            $table->text('youtube_profile_link')->nullable();
            $table->tinyInteger('is_youtube_verified')->default(0);
            $table->string('tin_number')->nullable();
            $table->string('bin_number')->nullable();
            $table->text('tin_cert_img')->nullable();
            $table->string('nid')->nullable();
            $table->text('insta_profile_link')->nullable();
            $table->tinyInteger('is_insta_verified')->default(0);

            $table->index('user_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_infos');
    }
};
