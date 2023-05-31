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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('shortDescription', 500);
            $table->float('price', 50);
            $table->boolean('discount');
            $table->float('discount_amount', 50);
            $table->string('image', 50);
            $table->boolean('stock');
            $table->string('stock_qty', 5);
            $table->double('star', 5);
            $table->enum('remark', ['top', 'sell', 'popular', 'bestsell', 'special']);
        
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
        
            // Relations
            $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('brand_id')->references('id')->on('brands')->restrictOnDelete()->cascadeOnUpdate();
        
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
