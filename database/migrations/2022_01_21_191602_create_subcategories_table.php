<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SUBCATE, function (Blueprint $table) {
            $table->id();
            $table->string('subcate_name')->nullable();
            $table->string('slug')->nullable();
            $table->integer('cate_id')->nullable();
            $table->text('descr')->nullable();
            $table->string('figure')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('status')->default(1)->comment('1 = Acitve, 0 = Inactive, 2 = delete');
            $table->timestamps();

            $table->foreign('cate_id')->references('id')->on(CATE)->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(SUBCATE);
    }
}
