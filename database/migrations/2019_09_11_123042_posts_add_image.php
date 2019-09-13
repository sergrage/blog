<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostsAddImage extends Migration
{

    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image');
            $table->string('imageAlt');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('imageAlt');
            $table->dropColumn('image');
        });
    }
}
