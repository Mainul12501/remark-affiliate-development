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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_category_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('thumb_img')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('herlan_cat_id')->unique();
            $table->string('herlan_cat_slug')->unique();
            $table->string('herlan_cat_uri', 600)->unique();
            $table->integer('herlan_cat_total_products')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_categories');
    }
};
