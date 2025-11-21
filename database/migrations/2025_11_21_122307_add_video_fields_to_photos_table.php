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
        Schema::table('photos', function (Blueprint $table) {
            $table->string('type')->default('image')->after('post_id'); // 'image' ou 'video'
            $table->string('video_url')->nullable()->after('image_path');
            // Importante: alterar image_path para aceitar null
            $table->string('image_path')->nullable()->change(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            //
        });
    }
};
