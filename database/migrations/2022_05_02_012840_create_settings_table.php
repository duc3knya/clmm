<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('keywords');
            $table->string('logo');
            $table->string('description');
            $table->string('favicon');
            $table->string('background');
            $table->integer('active');
            $table->integer('history');
            $table->integer('only_win');
            $table->integer('limit');
            $table->integer('day_mission');
            $table->integer('week_top');
            $table->string('ratioCL');
            $table->string('ratioCL2');
            $table->string('ratioTX');
            $table->string('ratioTX2');
            $table->string('ratio1P3');
            $table->string('ratioG3');
            $table->string('ratioH3');
            $table->string('ratioLO');
            $table->string('gift_week')->nullable();
            $table->string('gift_day')->nullable();
            $table->longText('note');
            $table->string('content');
            $table->string('content_day');
            $table->string('content_week');
            $table->longText('ads')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
