<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('tests', function (Blueprint $table) {
        // Check if the column exists before trying to drop it
        if (Schema::hasColumn('tests', 'user_id')) {
            $table->dropForeign(['user_id']); // Drop foreign key
            $table->dropColumn('user_id'); // Drop the column
        }
    });
}

public function down()
{
    Schema::table('tests', function (Blueprint $table) {
        // Re-add user_id column in case of rollback
        $table->unsignedBigInteger('user_id')->nullable();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}
};
