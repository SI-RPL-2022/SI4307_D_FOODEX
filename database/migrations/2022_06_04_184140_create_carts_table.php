<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->nullable()
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                    ->constrained('subscriptions');
            $table->foreignId('menu_id')->nullable()
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                    ->constrained('menus');
            $table->integer('quantity');
            $table->foreignId('user_id')
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                    ->constrained('users');
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
        Schema::dropIfExists('carts');
    }
}
