<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostsAddViews extends Migration
{

    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('views')->default(0);
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('views');
        });
    }
}
