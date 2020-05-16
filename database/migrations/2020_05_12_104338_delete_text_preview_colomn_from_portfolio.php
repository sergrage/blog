<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteTextPreviewColomnFromPortfolio extends Migration
{

    public function up()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('textPreview');
        });
    }


    public function down()
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->text('textPreview');
        });
    }
}
