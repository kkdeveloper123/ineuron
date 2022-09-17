<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_template_pages', function (Blueprint $table) {
            $table->id();
            $table->string('temp_name')->nullable();
            $table->string('temp_slug')->nullable();
            $table->text('heading')->nullable();
            $table->longText('content')->nullable();
            $table->string('img')->nullable();
            $table->integer('status')->default(1)->comment('1 = Acitve, 0 = Inactive');;
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
        Schema::dropIfExists('template_pages');
    }
}
