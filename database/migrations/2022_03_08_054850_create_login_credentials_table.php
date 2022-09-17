<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(LOGIN, function (Blueprint $table) {
            $table->id();
            $table->integer('auth_id')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('role_status')->nullable()->comment('1 = Admin,2 = subadmin, 3 = User');
            $table->integer('user_block_status')->default(1)->comment('1 = Acitve, 0 = Block');
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
        Schema::dropIfExists(LOGIN);
    }
}
