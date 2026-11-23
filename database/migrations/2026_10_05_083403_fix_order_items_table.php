<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {

            $table->unsignedBigInteger('order_id')->after('id');
            $table->unsignedBigInteger('food_id')->after('order_id');

            $table->string('food_name')->after('food_id');
            $table->decimal('price', 10, 2)->after('food_name');
            $table->integer('quantity')->after('price');
            $table->decimal('subtotal', 10, 2)->after('quantity');

        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {

            $table->dropColumn([
                'order_id',
                'food_id',
                'food_name',
                'price',
                'quantity',
                'subtotal',
            ]);

        });
    }
};