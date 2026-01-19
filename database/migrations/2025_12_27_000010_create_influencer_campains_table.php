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
        Schema::create('influencer_campains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['single', 'campain'])->default('single');
            $table->unsignedBigInteger('created_by');
            $table->string('title');
            $table->string('parent_ref_code')->unique();
            $table->text('thumb_img')->nullable();
            $table->text('note')->nullable();
            $table->integer('total_viewed')->default(0);
            $table->text('cam_full_url')->nullable();
            $table->text('cam_short_uri')->nullable();
            $table->tinyInteger('status')->default(1);

            $table->index('created_by');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('influencer_campains');
    }
};
