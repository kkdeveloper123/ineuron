<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(PAYMENT, function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('amount')->nullable();
            $table->text('payload')->nullable();
            $table->string('template_id')->nullable();
            $table->string('template_name')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
