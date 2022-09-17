<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ADMIN, function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->string('mobile')->nullable();
            $table->string('google_id')->nullable();
            $table->string('fb_id')->nullable();
            $table->string('login_type')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('role_status')->nullable()->comment('1 = Admin,2 = subadmin, 3 = User');
            $table->string('forget_key')->nullable();
            $table->timestamp('expire_forget_key')->nullable();
            $table->integer('user_status')->default(0)->comment('1 = Acitve, 0 = Inactive');
            $table->integer('user_block_status')->default(1)->comment('1 = Acitve, 0 = Block');
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
