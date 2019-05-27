<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tag_name',128)->default('')->comment('标签名称');
            $table->string('tag_alias',128)->default('')->comment('标签别名');
            $table->string('tag_intro',255)->default('')->comment('标签介绍');
            $table->unsignedInteger('post_count')->default(0)->comment('标签所包含的文章数');
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
        Schema::dropIfExists('tags');
    }
}
