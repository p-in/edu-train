<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->default(0)->comment('评论的用户id， 谁在评论');
            $table->unsignedInteger('post_id')->default(0)->comment('评论的文章id');
            $table->unsignedTinyInteger('comment_status')->default(0)->comment('评论状态 默认0-未审核 1-已显示 2-已屏蔽');
            $table->string('comment_forbid_reason',255)->default('')->comment('评论屏蔽原因');
            $table->unsignedBigInteger('comment_parent')->default(0)->comment('回复的评论id，回复的是哪一条评论');
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
        Schema::dropIfExists('comments');
    }
}
