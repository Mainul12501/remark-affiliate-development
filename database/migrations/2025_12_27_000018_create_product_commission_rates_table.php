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
        Schema::create('product_commission_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_sku');
            $table
                ->enum('commission_type', ['percentage', 'fixed'])
                ->default('percentage');
            $table->float('amount')->default(0);
            $table->tinyInteger('status')->default(1);
            $table->string('product_name')->nullable();
            $table->text('product_image')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_commission_rates');
    }
};
