<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('type')->nullable();
            $table->text('event')->nullable();
            $table->string('venue')->nullable();
            $table->date('event_date')->nullable();
            $table->time('event_time')->nullable();
            $table->date('event_end_date')->nullable();
            $table->time('event_end_time')->nullable();
            $table->string('guest', 100)->nullable();
            $table->integer('event_status')->default(1);
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
        Schema::dropIfExists('events');
    }
};
