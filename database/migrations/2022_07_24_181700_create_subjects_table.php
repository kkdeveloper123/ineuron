<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SUBJECT, function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('name', 30)->nullable();
            $table->string('slug', 40)->nullable();
            $table->integer('cate_id');
            $table->foreign('cate_id')->references('id')->on(CATE)->onDelete('cascade');
            $table->integer('sub_cate_id');
            $table->foreign('sub_cate_id')->references('id')->on(SUBCATE)->onDelete('cascade');
            $table->string('img')->nullable();
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
        Schema::dropIfExists(SUBJECT);
    }
}
