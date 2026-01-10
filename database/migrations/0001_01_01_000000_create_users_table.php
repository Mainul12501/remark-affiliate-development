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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name');
            $table
                ->string('email')
                ->nullable()
                ->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token', 100)->nullable();
//            $table->text('two_factor_secret')->nullable();
//            $table->text('two_factor_recovery_codes')->nullable();
//            $table->timestamp('two_factor_confirmed_at')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table
                ->string('mobile')
                ->nullable()
                ->unique();
            $table->string('user_type')->nullable();
            $table->text('profile_image')->nullable();
            $table->string('provider')->nullable();
            $table->text('provider_token')->nullable();
            $table->text('provider_id')->nullable();
            $table
                ->string('username')
                ->nullable()
                ->unique();
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->tinyInteger('approve_status')->default(0);
            $table
                ->string('block_status')
                ->default('open')
                ->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('reffered_agent_url')->nullable();
            $table
                ->string('reffer_code')
                ->nullable()
                ->unique();
            $table
                ->integer('ref_influencer_count')
                ->default(0)
                ->nullable();
            $table->unsignedBigInteger('affiliate_badge_id')->nullable();
            $table->tinyInteger('has_infl_partner_access')->default(0);
            $table
                ->tinyInteger('is_super_dev')
                ->default(0)
                ->nullable();
            $table->string('user_slug')->nullable();
            $table->string('profile_title')->nullable();

            $table->index('user_id');
            $table->index('approved_by');
            $table->index('created_by');
            $table->index('affiliate_badge_id');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
