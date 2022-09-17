<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(EX_EVENT, function (Blueprint $table) {
            $table->id();
            $table->string('slug', 30)->unique();
            $table->string('event_name', 40)->nullable();
            $table->string('event_exam_ids', 100)->nullable();
            $table->integer('status')->default(1)->comment('1 = Acitve, 0 = Inactive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(EX_EVENT);
    }
}
