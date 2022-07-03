<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('price');
            $table->string('sunday_lunch')->nullable();
            $table->string('sunday_dinner')->nullable();
            $table->string('monday_lunch')->nullable();
            $table->string('monday_dinner')->nullable();
            $table->string('tuesday_lunch')->nullable();
            $table->string('tuesday_dinner')->nullable();
            $table->string('wednesday_lunch')->nullable();
            $table->string('wednesday_dinner')->nullable();
            $table->string('thursday_lunch')->nullable();
            $table->string('thursday_dinner')->nullable();
            $table->string('friday_lunch')->nullable();
            $table->string('friday_dinner')->nullable();
            $table->string('saturday_lunch')->nullable();
            $table->string('saturday_dinner')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
