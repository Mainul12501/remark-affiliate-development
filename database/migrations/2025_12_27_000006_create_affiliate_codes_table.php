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
        Schema::create('affiliate_codes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('created_by');
            $table->tinyInteger('is_parent_code')->default(1);
            $table->string('code')->unique();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->text('product_ref_link')->nullable();
            $table->integer('total_hit')->default(0);
            $table->integer('total_order')->default(0);
            $table->integer('total_sell')->default(0);
            $table->string('product_sku');
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('influencer_campain_id');

            $table->index('created_by');
            $table->index('influencer_campain_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliate_codes');
    }
};
