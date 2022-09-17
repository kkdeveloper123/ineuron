<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(EMAILDATA, function (Blueprint $table) {
            $table->id();
            $table->string('email_to')->nullable();
            $table->string('email_cc')->nullable();
            $table->string('email_bcc')->nullable();
            $table->string('subject')->nullable();
            $table->text('content')->nullable();
            $table->integer('template_id')->default(1);
            $table->integer('type')->default(0)->comment('0 = failed, 1 = send');
            $table->integer('trash')->default(0)->comment('1 = Trash, 0 = Not Trash');
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
        Schema::dropIfExists(EMAILDATA);
    }
}
