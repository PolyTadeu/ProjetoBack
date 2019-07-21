<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExemplariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exemplaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->string('author');
            $table->string('publishing_company');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->timestamps();
        });
        Schema::table('exemplaries', function (Blueprint $table) {
            $table->foreign("branch_id")->references('id')->on('branches')->onDelete('set null');

             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exemplaries');
    }
}
