<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(PAGES, function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('heading')->nullable();
            $table->text('content')->nullable();
            $table->text('images')->nullable();
            $table->text('urls')->nullable();
            $table->string('type')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists(PAGES);
    }
}
