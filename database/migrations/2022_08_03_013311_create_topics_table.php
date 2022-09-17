<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TOPIC, function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('name', 30)->nullable();
            $table->string('slug', 40)->nullable();
            $table->integer('subject_id');
            $table->foreign('subject_id')->references('id')->on(SUBJECT)->onDelete('cascade');
            $table->text('description')->nullable();
            $table->integer('status')->default(1)->comment('1 = Acitve, 0 = Inactive');
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
        Schema::dropIfExists(TOPIC);
    }
}
