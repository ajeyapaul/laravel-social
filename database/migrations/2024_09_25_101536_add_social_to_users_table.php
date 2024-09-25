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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('name');
            $table->string('avatar')->nullable()->after('password');
            $table->text('bio')->nullable()->after('avatar');
            $table->string('cover')->nullable()->after('bio');
            $table->enum('status', ['active', 'inactive', 'pending'])->default('pending')->after('cover');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('avatar');
            $table->dropColumn('bio');
            $table->dropColumn('cover');
            $table->dropColumn('status');
            $table->dropSoftDeletes();
        });
    }
};
