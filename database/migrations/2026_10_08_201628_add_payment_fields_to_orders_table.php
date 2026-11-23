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
        Schema::table('orders', function (Blueprint $table) {

            $table->enum('payment_method', [
                'cash',
                'mpesa',
                'airtel_money',
                'tigo_pesa',
            ])
            ->default('cash')
            ->after('status');

            $table->enum('payment_status', [
                'pending',
                'paid',
                'failed',
            ])
            ->default('pending')
            ->after('payment_method');

            $table->string('transaction_reference')
                ->nullable()
                ->after('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'payment_method',
                'payment_status',
                'transaction_reference',
            ]);

        });
    }
};