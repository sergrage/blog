<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{

    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body');
            $table->string('xCoordinate');
            $table->string('yCoordinate');
            $table->string('adress');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            Schema::dropIfExists('contacts');
        });
    }
}
