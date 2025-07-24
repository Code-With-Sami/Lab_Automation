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
        Schema::table('tests', function (Blueprint $table) {
            // Remove unnecessary column
            $table->dropColumn('department_id');
    
            // Add new column
            $table->unsignedBigInteger('assigned_by')->nullable()->after('product_id');
    
            // Add foreign key constraint
            $table->foreign('assigned_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tests', function (Blueprint $table) {
            // Re-add department_id if rollback
            $table->unsignedBigInteger('department_id')->nullable();
        });
    }
};
