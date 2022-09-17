<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ENQUIRY, function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('subject')->nullable();
            $table->string('phone')->nullable();
            $table->string('query')->nullable();
            $table->integer('trash')->default(0)->comment('0 = No trash,1 = Trash');
            $table->integer('msg_status')->default(0)->comment('0 = Unread,1 = Read');;
            $table->integer('reply_status')->default(0)->comment('0 = No reply,1 = Replied');;
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
        Schema::dropIfExists(ENQUIRY);
    }
}
