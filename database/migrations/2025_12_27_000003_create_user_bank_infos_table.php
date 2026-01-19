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
        Schema::create('user_bank_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('account_name')->nullable();
            $table->text('branch_name')->nullable();
            $table->string('routing_number')->nullable();
            $table->text('cheque_img')->nullable();
            $table->enum('vendor_type', ['mobile', 'bank'])->default('mobile');
            $table
                ->enum('mobile_vendor', [
                    'bkash',
                    'rocket',
                    'nagad',
                    'upay',
                    'surecash',
                ])
                ->default('bkash')
                ->nullable();
            $table->string('mobile_number')->nullable();
            $table->tinyInteger('status')->default(1);
            $table
                ->enum('active_status', ['inactive', 'active'])
                ->default('inactive');
            $table->string('active_till')->nullable();
            $table->string('account_number')->nullable();

            $table->index('user_id');
            $table->index('bank_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_bank_infos');
    }
};
