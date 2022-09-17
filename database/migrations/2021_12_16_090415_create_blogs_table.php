<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BLOGS, function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->integer('blog_cate')->default(0);
            $table->text('imgs')->nullable();
            $table->longText('content')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('blogs');
    }
}
