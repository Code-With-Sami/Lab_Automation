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
        Schema::create('tests', function (Blueprint $table) {
            $table->string('test_id')->primary();
            $table->unsignedBigInteger('product_id'); // Match the data type of 'id' in products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Reference 'id'
            $table->string('test_type');
            $table->text('criteria');
            $table->enum('result', ['Pass', 'Fail'])->nullable();
            $table->text('remarks')->nullable();
            $table->string('tested_by');
            $table->enum('status', ['Pending', 'In Progress', 'Completed'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
