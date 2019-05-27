<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * 分类表.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cate_name',128)->default('')->comment('分类名称');
            $table->string('cate_alias',128)->default('')->comment('分类别名');
            $table->string('cate_intro',255)->default('')->comment('分类介绍');
            $table->unsignedInteger('posts_count')->default(0)->comment('分类下的文章数');
            $table->unsignedInteger('cate_order')->default(0)->comment('分类排序');
            $table->unsignedInteger('parent_id')->default(0)->comment('分类父id');
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
        Schema::dropIfExists('category');
    }
}
