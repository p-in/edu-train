<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * 用户表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',60)->default('')->comment('用户名');
            $table->string('password',128)->default('')->comment('用户密码');
            $table->string('nickname',60)->default('')->comment('用户昵称');
            $table->string('email',100)->default('')->comment('用户邮箱');
            $table->char('cellphone',11)->default('')->comment('用户手机号');
            $table->string('avatar',100)->default('')->comment('用户头像');
            $table->unsignedTinyInteger('user_level')->default(0)->comment('用户等级');
            $table->unsignedTinyInteger('user_status')->default(0)->comment('用户状态 默认0-正常 1-临时冻结 2-永久封号');
            $table->unsignedInteger('user_close_time')->default(0)->comment('用户临时冻结时限 以秒为单位');
            $table->unsignedInteger('last_login_ip')->default(0)->comment('用户最近一次登录ip');

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
        Schema::dropIfExists('users');
    }
}
