<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventStudioPivotTable extends Migration
{
    public function up()
    {
        Schema::create('event_studio', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'event_id_fk_5638044')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('studio_id');
            $table->foreign('studio_id', 'studio_id_fk_5638044')->references('id')->on('studios')->onDelete('cascade');
        });
    }
}
