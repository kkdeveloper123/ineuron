<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoPagesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SEO_CONT, function (Blueprint $table) {
            $table->increments('id');
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('og_url')->nullable();
            $table->text('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->text('keywords')->nullable();
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
        Schema::dropIfExists('seo_pages_contents');
    }
}
