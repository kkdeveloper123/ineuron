<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CATE, function (Blueprint $table) {
            $table->id();
            $table->string('cate_name')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('img')->nullable();
            $table->enum('status', ['0', '1', '2'])->default(1)->comment('1 = Acitve, 0 = Inactive, 2 = delete');
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
        Schema::dropIfExists('categories');
    }
}
