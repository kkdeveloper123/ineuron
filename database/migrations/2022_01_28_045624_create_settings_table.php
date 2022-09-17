<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SETTING, function (Blueprint $table) {
            $table->id();
            $table->text('api_keys')->nullable();
            $table->string('type')->nullable();
            $table->enum('mode', ['0', '1'])->default(1)->comment('1 = Sandbox, 0 = Production');
            $table->enum('status', ['0', '1'])->default(1)->comment('1 = Acitve, 0 = Inactive');
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
        Schema::dropIfExists('settings');
    }
}
