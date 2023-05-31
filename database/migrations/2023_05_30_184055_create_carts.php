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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->unsignedBigInteger('product_id');
            $table->string('color', 50);
            $table->string('size', 50);




            //relation
            $table->foreign('product_id')->references('id')->on('products')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('email')->references('email')->on('users')->restrictOnDelete()->cascadeOnUpdate();
           

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
           $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
