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
        Schema::create('product_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->string('title');
            $table->text('src');
            $table
                ->tinyInteger('position')
                ->default(0)
                ->nullable();
            $table->text('img_alt')->nullable();
            $table->tinyInteger('status')->default(1);
            $table
                ->unsignedBigInteger('herlan_img_id')
                ->nullable()
                ->unique();
            $table->text('herlan_img_src')->nullable();

            $table->index('product_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
