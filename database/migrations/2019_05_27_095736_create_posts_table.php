<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * 文章相关 表.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->default(0)->comment('文章所属分类id，同e_category表中的id');
            $table->integer('user_id')->default(0)->comment('文章所属用户id，同e_users表中的id');
            $table->string('post_tag',255)->default('')->comment('文章标签，由e_tags表中的id组合而成，以|分隔');
            $table->string('post_title',255)->default('')->comment('文章标题');
            $table->string('post_intro',255)->default('')->comment('文章简介');
            $table->string('post_password',128)->default('')->comment('文章查看密码');
            $table->unsignedTinyInteger('post_status')->default(0)->comment('文章状态  默认0-待审核 1-公开 2-私有 3-锁定');
            $table->unsignedTinyInteger('comment_status')->default(0)
                  ->comment('文章的评论状态  默认0-开启 1-关闭 2-一段时间后关闭评论');
            $table->unsignedInteger('comment_close_time')->default(0)->comment('文章评论状态为2时的时间限制 以秒为单位');
            $table->unsignedBigInteger('post_view_count')->default(0)->comment('文章查看数');
            $table->unsignedInteger('post_zan_count')->default(0)->comment('文章点赞数');
            $table->unsignedInteger('post_comment_count')->default(0)->comment('文章评论数');
            $table->unsignedInteger('post_parent')->default(0)->comment('文章所属的页面id');
            $table->timestamps();
        });

        Schema::create('posts_content', function (Blueprint $table) {
            $table->unsignedInteger('id')->default(0)->unique()->comment('同e_posts表的id');
            $table->longText('post_content')->default('')->comment('文章内容');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('posts_content');
    }
}
