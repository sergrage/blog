<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{

    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('text');
            $table->text('answer')->nullable();
            $table->boolean('proven')->default(false);
            $table->string('status', 16);
            $table->timestamps();
            $table->timestamp('answered_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
