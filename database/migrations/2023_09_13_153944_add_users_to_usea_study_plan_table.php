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
        Schema::table('usea_study_plan', function (Blueprint $table) {
            $table->integer('user_id')->after('study_plan_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usea_study_plan', function (Blueprint $table) {
            $table->drop('user_id');
        });
    }
};
