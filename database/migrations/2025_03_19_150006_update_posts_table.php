<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Rename `content` to `description` if necessary
            if (Schema::hasColumn('posts', 'content')) {
                $table->renameColumn('content', 'description');
            }

            // Ensure all expected columns exist
            if (!Schema::hasColumn('posts', 'slug')) {
                $table->string('slug')->unique();
            }
            if (!Schema::hasColumn('posts', 'image')) {
                $table->string('image')->nullable();
            }
            if (!Schema::hasColumn('posts', 'user_id')) {
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('posts', 'category_id')) {
                $table->foreignId('category_id')->nullable()->constrained();
            }
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            if (Schema::hasColumn('posts', 'description')) {
                $table->renameColumn('description', 'content');
            }
        });
    }
};
